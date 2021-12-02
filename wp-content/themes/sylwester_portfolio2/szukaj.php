<?php
/*
Template Name: Szukaj
*/
get_header();
error_reporting(0);
?>


<section id="content">

    <div class="content">
        <div class="title">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="search">
            <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>