<?php
/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options/');
require_once dirname(__FILE__) . '/options/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template('options.php');
load_template($optionsfile);

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts()
{ ?>

    <script type="text/javascript">
        jQuery(document).ready(function () {

            jQuery('#example_showhidden').click(function () {
                jQuery('#section-example_text_hidden').fadeToggle(400);
            });

            if (jQuery('#example_showhidden:checked').val() !== undefined) {
                jQuery('#section-example_text_hidden').show();
            }

        });
    </script>

    <?php
}

/*
 * This is an example of filtering menu parameters
 */

function prefix_options_menu_filter($menu)
{
    $menu['mode'] = 'menu';
    $menu['page_title'] = __('主题设置', 'textdomain');
    $menu['menu_title'] = __('主题设置', 'textdomain');
    $menu['menu_slug'] = 'pluto';
    return $menu;
}

add_filter('optionsframework_menu', 'prefix_options_menu_filter');

function pluto_theme_scripts()
{
    $url = get_template_directory_uri();
    wp_enqueue_style("bootstrap", $url . "/static/css/bootstrap.min.css", array(), "4.3.1");
    wp_enqueue_style("font-awesome", $url . "/static/css/font-awesome.min.css", array(), "4.7.0");
    wp_enqueue_style("pluto", $url . "/static/css/pluto.css", array(), PLUTO_VERSION);
    wp_enqueue_style("font", $url . "/static/css/font.css", array(), PLUTO_VERSION);
    wp_enqueue_script("jquery", $url . "/static/js/jquery-3.4.1.min.js", array(), "3.4.1");
    wp_enqueue_script("pluto", $url . "/static/js/pluto.js", array(), PLUTO_VERSION);
    wp_enqueue_script("ajax", $url . "/static/js/ajax.js", array(), PLUTO_VERSION);
    wp_enqueue_script("layer", $url . "/static/js/layer/layer.js", array(), "3.1.1");
    if (pluto_option("live2d") && !wp_is_mobile()) {
        wp_enqueue_script("live2d", $url . "/static/js/live2d.js", array(), "12d");
        wp_enqueue_script("live2d-message", $url . "/static/js/message.js", array(), PLUTO_VERSION);
        wp_enqueue_style("live2d", $url . "/static/css/live2d.css", array(), PLUTO_VERSION);
    }
    $local = array(
        "url" => get_stylesheet_directory_uri(),
        "ajax_url" => admin_url('admin-ajax.php'),
    );
    wp_localize_script("pluto", "pluto", $local);
}

add_action("wp_enqueue_scripts", "pluto_theme_scripts");

/*
 * deregister default jquery
 */
function pluto_deregister_jquery()
{
    wp_deregister_script("jquery");
}

add_action("wp_enqueue_scripts", "pluto_deregister_jquery", 1);

/*
 * Remove wp_head() code
 */
remove_action("wp_head", "feed_links", 2); //去除文章的feed
remove_action("wp_head", "feed_links_extra", 3); //去除分类等feed
remove_action("wp_head", "rsd_link"); //禁用rsd;
remove_action("wp_head", "wlwmanifest_link"); //禁用wwt(Windows Live Writer)
remove_action("wp_head", "wp_generator"); //WordPress版本信息
remove_action('wp_head', 'wp_print_head_scripts', 9); // 将head的js拉到下面来


/*
 * Remove adminBar
 */
add_filter("show_admin_bar", "__return_false");

/*
 * excerpt
 */
function pluto_excerpt_length()
{
    return 170;
}

add_filter("excerpt_length", "pluto_excerpt_length");
function pluto_excerpt_more()
{
    return "……";
}

add_filter("excerpt_more", "pluto_excerpt_more");

/*
 * home title
 */
function pluto_wp_title($title, $sep)
{
    global $paged;
    $title .= get_bloginfo('name');
    $site_description = get_bloginfo('description', 'display');
    if ((is_home() || is_front_page()) && $site_description) $title = "$title $sep";
    if ($paged >= 2) $title = "$title $sep" . sprintf("Page %s", $paged);
    return $title;
}

add_filter("wp_title", "pluto_wp_title", 10, 2);

/*
 * redirect to theme_options when theme is tured on
 */
function pluto_load_themes()
{
    global $pagenow;
    if ('themes.php' == $pagenow && isset($_GET['activated'])) {
        // 跳转到设置界面
        wp_redirect(admin_url('themes.php?page=pluto'));
        exit;
    }
}

add_action("load-themes.php", "pluto_load_themes");

function comments_err($a) {
    header('HTTP/1.0 500 Internal Server Error');
    header('Content-Type: text/plain;charset=UTF-8');
    echo $a;
    exit;
}
/*
 * comments ajax
 */
function ajax_comments() {
    $comment = wp_handle_comment_submission(wp_unslash($_POST));
    if (is_wp_error($comment)) {
        $data = $comment->get_error_data();
        if (!empty($data)) comments_err($data);
        else exit;
    }
    $user = get_current_user();
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?>>
        <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment-author vcard">
                <?php echo get_avatar($comment,$size = '50'); ?>
                <cite class="fn">
                    <?php echo get_comment_author_link($user); ?>
                </cite>
            </div>
            <div class="comment-meta commentmetadata">
                <?php echo get_comment_date();
                echo get_comment_date(' H:i'); ?>
            </div>
            <?php comment_text(); ?>
        </div>
    </li>
    <?php
    die();
}
add_action("wp_ajax_nopriv_comment", "ajax_comments");
add_action("wp_ajax_comment", "ajax_comments");