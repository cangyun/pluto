<?php

function pluto_get_post_views() {
    global $post;
    $postID = $post->ID;
    $views = (int)get_post_meta($postID, 'views', true);
    return $views;
}

function pluto_set_post_views() {
    if (is_singular()) {
        global $post;
        $postID = $post->ID;
        $views = (int)get_post_meta($postID, 'views',true);
        if (!update_post_meta($postID, 'views', $views + 1)) add_post_meta($postID, 'views', 1, true);
    }
}

add_action('wp_head', 'pluto_set_post_views');

function pluto_thumbnail_new() {
    global $post;
    $img_id = get_post_thumbnail_id();
    $img_url = wp_get_attachment_image_src($img_id);
    $img_url = $img_url[0];
    if (has_post_thumbnail()) {
        echo '<a href="'. get_permalink() .'"><img src="'. $img_url .'"></a>';
    } else {
        $content = $post->post_content;
        $img_preg = "/<img(.*?)src=\"(.+?)\".*?>/";
        preg_match($img_preg, $content,$img_src);
        $img_count = count($img_src) - 1;
//        if (isset($img_src[$img_count]))
//            $img_url = $img_src[$img_count];
//        if (!empty($img_url)) {
//            echo '<a href="'.get_permalink() .'"><img src="'.$img_url .'"></a>';
//        } else {
            $random = mt_rand(1,20);
            echo '<a href="'. get_permalink() .'"><img src="'. get_bloginfo('template_url') .'/static/images/thumb/thumb_'. $random .'.jpg"></a>';
//        }
    }
}

function pluto_pages($range = 3) {
    global $paged,$wp_query,$max_page;
    if(!$max_page){$max_page=$wp_query->max_num_pages;}
    if($max_page>1) {
        if (!$paged) {
            $paged = 1;
        }
        echo '<div class="text-center"><ul class="pagination">';
        if ($paged != 1) echo '<li><a href="' . get_pagenum_link(1) . '">&laquo;</a></li>';
        if ($paged > 1) echo '<li><a href="' . get_pagenum_link($paged - 1) . '">&lt;</a></li>';
        if ($max_page > $range) {
            if ($paged < $range) {
                for ($i = 1; $i <= $max_page; $i++) {
                    echo '<li';
                    if ($i == $paged) echo " class='active'";
                    echo "><a href='" . get_pagenum_link($i) . "'>$i</a></li>";
                }
            } else if ($paged >= ($max_page - ceil($range / 2))) {
                for ($i = $max_page - $range; $i <= $max_page; $i++) {
                    echo '<li';
                    if ($i == $paged) echo " class='active'";
                    echo "><a href='" . get_pagenum_link($i) . "'>$i</a></li>";
                }
            } else if ($paged < ($max_page - ceil($range / 2))) {
                for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil($range / 2)); $i++) {
                    echo '<li';
                    if ($i == $paged) echo " class='active'";
                    echo "><a href='" . get_pagenum_link($i) . "'>$i</a></li>";
                }
            }
        } else {
            for ($i = 1; $i <= $max_page; $i++) {
                echo '<li';
                if ($i == $paged) echo " class='active'";
                echo "><a href='" . get_pagenum_link($i) . "'>$i</a></li>";
            }
        }
        if ($paged < $max_page) echo '<li><a href="' . get_pagenum_link($paged + 1) . '">&gt;</a></li>';
        if ($paged != $max_page) echo '<li><a href="' . get_pagenum_link($max_page) . '">&raquo;</a></li>';
        echo '</ul></div>';
    }
}