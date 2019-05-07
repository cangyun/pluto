<?php
function content_title($attr, $content = null, $code = "")
{
    $return .= "<h2 class='content-title'>";
    $return .= $content;
    $return .= '</h2>';
    return $return;
}

add_shortcode('title', 'content_title');

function xcollapse($attr, $content = null, $code = "")
{
    extract(shortcode_atts(array("title"=>"Title"),$attr));
    $return = '<div class="xControl"><div class="xHeading"><div class="xIcon"><i class="fa fa-plus"></i></div><h5>';
    $return .= $title;
    $return .= '</h5></div><div class="xContent"><div class="inner">';
    $return .= do_shortcode($content);
    $return .= '</div></div></div>';
    return $return;
}

add_shortcode('collapse', 'xcollapse');

function danger($attr, $content=null,$code="") {
    $return = '<div class="alert alert-danger">';
    $return .= do_shortcode($content);
    $return .= "</div>";
    return $return;
}

add_shortcode('danger', 'danger');

function more_button()
{
    if (!current_user_can("edit_posts") && !current_user_can("edit_pages")) return;
    add_filter("mce_external_plugins", "add_buttons");
    add_filter("mce_buttons", "register_buttons");
}

add_action("init", "more_button");

function register_buttons($buttons)
{
    array_push($buttons, "title");
    array_push($buttons, "collapse");
    array_push($buttons, "danger");
    return $buttons;
}

function add_buttons($plugins)
{
    $plugins['title'] = get_bloginfo("template_url") . '/inc/buttons/more.js';
    $plugins['collapse'] = get_bloginfo("template_url") . '/inc/buttons/more.js';
    $plugins['danger'] = get_bloginfo("template_url") . '/inc/buttons/more.js';
    return $plugins;
}

function add_quicktags()
{ ?>
    <script type="text/javascript">
        try {
            QTags.addButton('Title', 'Title', '[title]', '[/title]');
            QTags.addButton('Collapse', 'Collapse', '[collapse title="collapse"]', '[/collapse]');
            QTags.addButton("Danger", "Danger", "[danger]", "[/danger]");
        } catch (e) {

        }
    </script>
    <?php
}

add_action('admin_print_footer_scripts', 'add_quicktags');
?>