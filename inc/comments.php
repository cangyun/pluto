<?php
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