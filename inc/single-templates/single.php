<section>
    <?php if(have_posts()) the_post(); ?>
    <article>
        <div class="pluto-single">
            <div class="pluto-header-single">
                <h1 class="pluto-title-single text-center"><?php the_title(); ?></h1>
                <div class="pluto-meta-single text-center">
                    <span>
                        <i class="fa fa-calendar"></i> <?php echo get_the_date(); ?>
                        <i class="fa fa-commenting-o"></i> <?php comments_number('0', '1', '%'); ?> Comments
                        <i class="fa fa-eye"></i> <?php echo pluto_get_post_views(); ?> Views
                        <i class="fa fa-user"></i> <?php the_author(); ?>
                    </span>
                </div>
            </div>
            <div class="pluto-content-single">
                <?php the_content(); ?>
            </div>
            <?php if (pluto_option('post_cc')) { ?>
                <div class="pluto-copyright-single text-center clearfix">
                    <h5>This article is released under the <a rel="license nofollow" target="_blank" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a></h5>
                </div>
            <?php } ?>
            <div class="pluto-footer-single clearfix">
                <div class="pull-left">
                    <i class="fa fa-tags"></i>
                    <?php if(get_the_tags()) the_tags('','',''); else {echo '<a>No Tag</a>';} ?>
                </div>
                <div class="pull-right pluto-footer-date-single">
                    <span>Last modified: <?php the_modified_date(); ?></span>
                </div>
            </div>
        </div>
        <nav class="pluto-navigation clearfix">
            <?php
                $prev_post = get_previous_post();
                if (!empty($prev_post)) {
            ?>
                    <div class="nav-previous">
                        <a title="<?php echo $prev_post->post_title; ?>" href="<?php echo get_permalink($prev_post->ID); ?>">< Previous</a>
                    </div>
            <?php } ?>
            <?php
                $next_post = get_next_post();
                if (!empty($next_post)) {
            ?>
                    <div class="nav-next">
                        <a title="<?php echo $next_post->post_title; ?>" href="<?php echo get_permalink($next_post->ID); ?>">Next ></a>
                    </div>
            <?php } ?>
        </nav>
        <?php comments_template(); ?>
    </article>
</section>