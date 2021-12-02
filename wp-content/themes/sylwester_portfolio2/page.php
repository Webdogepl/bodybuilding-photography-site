<?php

/**
 * The template for displaying pages
 *
 */

get_header(); ?>

<li style="display:none;"><a href="/"><img class="facebook-img" src="<?php echo wpse207895_featured_image(); ?>" alt="og"></a></li>



<main>

    <div class="page-container">


        <h1 class="page-title"><?php wp_title(''); ?></h1>

        <section class="page-content">

            <?php
            wp_reset_query();
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>

        </section>
    </div>

</main>

<?php get_footer() ?>