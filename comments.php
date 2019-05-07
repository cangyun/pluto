<?php if (post_password_required()) return; ?>
<div id="comments">
    <ol class="comment-list">
        <?php if (have_comments()){ ?>
        <?php wp_list_comments(array('style' => 'ol', 'short_ping' => true, 'avatar_size' => 50,)); ?>
    </ol>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { ?>
        <div class="comments-nav">
            <?php paginate_comments_links('prev_text=Previous&next_text=Next'); ?>
        </div>
    <?php }
    } else echo '</ol>'; ?>

    <?php $args = array(
        'comment_field' => '<div class="comments-form">
        <div class="input-group">
            <textarea name="comment" rows="5" class="form-control" aria-required="true" required placeholder="Add a comment"></textarea>
        </div>
    </div>',
        'class_submit' => 'btn btn-primary',
        'reply'
    );
    comment_form($args); ?>
</div>
