<?php get_header() ?>
<div id="page">
    <div class="container">
        <main id="index">
            <?php
                if (is_home()) {

                } else if (is_search()) { ?>
                    <div class="pluto-card d-flex">
                        <h1 class="pluto-card-title">Search results: <?php the_search_query(); ?></h1>
                    </div>
                <?php
                }
            ?>
            <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part("/inc/content-templates/content", get_post_format());
                    }
                } else { ?>
                    <div class="pluto-card d-flex">
                        <h1 class="pluto-card-title">Sorry, nothing was found.</h1>
                    </div>
                <?php
                }
            ?>
        </main>
        <?php pluto_pages(3) ?>
        <div id="tools">

        </div>
    </div>
</div>
<?php get_footer() ?>
