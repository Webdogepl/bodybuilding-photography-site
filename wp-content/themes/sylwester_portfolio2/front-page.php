<?php /*
* Template name: Frontpage
*/ ?>


<?php get_header(); ?>



<section id="content" class="main">

    <div class="frontpage-top">

        <div class="frontpage-top--background-overlay"></div>


        <div class="flex-wrapper">
            <div class="frontpage-top__image-of-month">
                <h3 class="image-of-month__title"><?php pll_e('Zdjęcie miesiąca') ?></h3>
                <img class="image-of-month" src="<?php echo get_field('zdjecie_miesiaca', 1203) ?>" alt="Zdjęcie miesiąca">
                <p class="share-wrapper">
                    <a class="image-of-month__share" href="https://www.facebook.com/sharer/sharer.php?u=sylwesterszymczuk.com" target="_blank">
                        <?php pll_e('Udostępnij') ?> <i class="fas fa-share"></i>
                    </a>
                </p>
            </div>
            <div class="frontpage-top__links">
                <p><a href="<?php pll_e('/probki-zdjec') ?>"><?php pll_e('Próbki zdjęć') ?></a></p>
                <p><a href="<?php pll_e('/reportaze') ?>"><?php pll_e('Reportaże') ?></a></p>
                <p><a href="<?php pll_e('/oferta') ?>"><?php pll_e('Oferta') ?></a></p>
            </div>
        </div>


        <a href="#blog">
            <p class="arrow-down"><i class="fas fa-angle-double-down"></i></p>
        </a>

    </div>



</section>

</div>

</section>

<section id="content" class="frontpage">


    <?php if (pll_current_language() == 'pl') { ?>


        <div class="frontpage-blog" id="blog">

            <h2 class="frontpage-blog__title">NEWS</h2>

            <?php $the_query = new WP_Query('posts_per_page=4'); ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>



                <div class="article">
                    <a href="<?php the_permalink() ?>">
                        <div class="article__image"><?php if (has_post_thumbnail()) {
                                                        the_post_thumbnail('full');
                                                    } ?>

                            <div class="article__gradient"></div>

                            <div class="article__content">

                                <p class="article-date"><?php echo get_the_date('d.m.20y') ?></p>

                                <h3 class="article-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

                            </div>
                        </div>
                    </a>
                </div>


            <?php
            endwhile;
            wp_reset_postdata();
            ?>

        </div>

    <?php } ?>


    <div class="frontpage-products" id="frontpage-products">

        <h2 class="frontpage-products__title"><?php pll_e('OFERTA') ?></h2>


        <?php if (pll_current_language() == 'pl') {
            echo do_shortcode('[products columns="4" orderby="menu_order" order="asc" category="pakiety-pl"]'); ?>

            <h3 class="zobacz-oferte"><a href="<?php pll_e('/oferta') ?>"><?php pll_e('Zobacz pełną ofertę') ?></a></h3>

        <?php

        } else {
            echo do_shortcode('[products columns="1" orderby="menu_order" order="asc" category="pakiety-en"]');
        }
        ?>

    </div>


    <div class="contact" id="kontakt">
        <div class="contact-opacity"></div>


        <div class="contact-left">

            <h2 class="contact-title"><?php pll_e('KONTAKT') ?></h2>

            <h4><?php pll_e('Masz pytanie?') ?></h4>
            <h3><?php pll_e('Napisz do mnie') ?></h3>


            <?php if (pll_current_language() == 'pl') {
                echo do_shortcode('[contact-form-7 id="47052"]');
            } else {
                echo do_shortcode('[contact-form-7 id="47525"]');
            } ?>

        </div>


        <div class="contact-right">


            <h4>Sylwester</h4>
            <h3>Szymczuk</h3>

            <ul class="contact-list">
                <li><i class="fas fa-phone"></i> +48 531 247 678</li>
                <li><a href="https://www.instagram.com/sylwesterszymczuk/?hl=pl" target="_blank"><i class="fab fa-instagram"></i> sylwesterszymczuk</a></li>
                <li><a href="https://www.facebook.com/sszymczuk" target="_blank"><i class="fab fa-facebook-f"></i> sszymczuk</a></li>
                <li><i class="fas fa-envelope"></i> sszymczuk@gmail.com</li>
            </ul>

        </div>


    </div>


</section>


<?php get_footer(); ?>