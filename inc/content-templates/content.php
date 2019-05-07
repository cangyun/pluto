<article class="pluto-card">
    <div class="pluto-border-new">
        <div class="flex-column flex-sm-column d-flex flex-md-row flex-lg-row flex-xl-row">
            <div class="pluto-thumb-new flex-shrink-0">
                <?php pluto_thumbnail_new(); ?>
            </div>
            <div class="pluto-inner-new">
                <div class="pluto-header-new">
                    <?php $category=get_the_category();if($category) echo '<a class="label" href="'.get_category_link($category[0]->term_id).'">'.$category[0]->cat_name.'</a>'; ?>
                    <h2 class="pluto-title-new"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="pluto-entry-content-new">
                    <p><?php echo wp_trim_words(get_the_excerpt(), 110); ?></p>
                </div>
            </div>
        </div>
        <div class="pluto-meta-new">
            <span class="pull-left">
                <a><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></a>
                <a href="<?php the_permalink() ?>#comments"><i class="fa fa-commenting-o"></i> <?php comments_number('0','1','%') ?> Comments</a>
            </span>
            <span class="visible-lg visible-xl visible-md pull-left">
                <a href="<?php the_permalink() ?>"><i class="fa fa-eye"></i> <?php echo pluto_get_post_views() ?> Views</a>
                <a href="<?php site_url() ?>/?author=<?php the_author_ID() ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>
            </span>
            <span class="pull-right">
                <a href="<?php the_permalink(); ?>" class="read-more">Read More <i class="fa fa-chevron-circle-right"></i></a>
            </span>
        </div>
    </div>
</article>