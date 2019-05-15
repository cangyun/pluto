<?php
function pluto_user_profile($user)
{ ?>
    <table class="form-table">
        <tbody>
        <tr>
            <th>
                上传自定义头像
            </th>
            <td style="width: 50px;">
                <?php echo get_avatar($user->ID); ?>
            </td>
            <td>
                <input type="file" name="local-avatar" id="local-avatar">
            </td>
        </tr>
        </tbody>
    </table>
    <script>
        let form = document.getElementById("your-profile");
        form.encoding = "multipart/form-data";
        form.enctype = "multipart/form-data";
    </script>
    <?php
}

add_action("show_user_profile", "pluto_user_profile");
add_action("edit_user_profile", "pluto_user_profile");

function user_profile_update($user_id)
{
    if (!empty($_FILES['local-avatar']['name'])) {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif' => 'image/gif',
            'png' => 'image/png',
            'bmp' => 'image/bmp',
            'tif|tiff' => 'image/tiff'
        );
        $avatar = wp_handle_upload($_FILES['local-avatar'], array('mimes' => $mimes, 'test_form' => false));
        if (empty($avatar['file'])) {
            return;
        }
        avatar_delete($user_id);
        update_user_meta($user_id, "local-avatar", array('full' => $avatar['url']));
    }
}

add_action("edit_user_profile_update", "user_profile_update");
add_action("personal_options_update", "user_profile_update");

function avatar_delete($user_id)
{
    $old_avatars = get_user_meta($user_id, 'local-avatar', true);
    $upload_path = wp_upload_dir();
    if (is_array($old_avatars)) {
        foreach ($old_avatars as $old_avatar) {
            $old_avatar_path = str_replace($upload_path['baseurl'], $upload_path['basedir'], $old_avatar);
            @unlink($old_avatar_path);
        }
    }
    delete_user_meta($user_id, 'local-avatar');
}

function pluto_get_avatar($avatar = '', $id_or_email, $size = '96', $default = '', $alt = false)
{
    if (is_numeric($id_or_email)) {
        $user_id = (int) $id_or_email;
    } else if (is_string($id_or_email)&&($user=get_user_by('email',$id_or_email))) {
        $user_id = $user->ID;
    } else if (is_object($id_or_email) && !empty($id_or_email->user_id)) {
        $user_id = (int) $id_or_email->user_id;
    }
    if (!empty($user_id)) $local_avatar = get_user_meta($user_id, "local-avatar", true);
    if (empty($local_avatar) || !isset($local_avatar['full'])) {
        if (!empty($avatar)) return $avatar;
        remove_filter("get_avatar", "pluto_get_avatar", 100);
        $avatar = get_avatar($id_or_email, $size, $default);
        add_filter("get_avatar", "pluto_get_avatar", 100, 5);
        return $avatar;
    }
    if (!$alt) {
        $alt = get_user_meta("$user_id", "display_name", true);
    }
    if (empty($local_avatar[$size])) {
        $upload_path = wp_upload_dir();
        $path = str_replace($upload_path['baseurl'], $upload_path['basedir'], $local_avatar['full']);
        $image_sized = image_resize($path, $size, $size, true);
        if (is_wp_error($image_sized)) // deal with original being >= to original image (or lack of sizing ability)
            $local_avatar[$size] = $local_avatar['full'];
        else
            $local_avatar[$size] = str_replace($upload_path['basedir'], $upload_path['baseurl'], $image_sized);
        update_user_meta($user_id, '$local_avatar', $local_avatar);
    }else if(substr($local_avatar[$size],0,4)!='http') $local_avatar[$size] = home_url($local_avatar[$size]);
    $author_class = is_author($user_id) ? ' current-author' : '';
    $avatar = "<img alt='". esc_attr($alt) ."' src='". $local_avatar[$size] ."' class='avatar avatar-${size}${author_class} photo' height=${size} width=${size} />";
    return $avatar;
}
add_filter("get_avatar", "pluto_get_avatar", 100, 5);