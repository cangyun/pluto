<?php get_header(); ?>
    <div id="page">
        <div class="container">
            <?php get_template_part('/inc/single-templates/single', get_post_format()); ?>
        </div>
    </div>
<?php get_footer(); ?>
