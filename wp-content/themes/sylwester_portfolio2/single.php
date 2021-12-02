<?php
/*
* Post Template
*/
?>




<?php get_header(); ?>



<main>

    <section class="post" id="content">


        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <h2 class="post__title"><?php the_title(); ?></h2>

                <div class="post__image"><?php if (has_post_thumbnail()) { ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="post-thumbnail">
                    <?php } ?>

                    <div class="post__image__background"><img src="<?php the_post_thumbnail_url('full') ?>"></div>

                </div>

                <div class="post__content"><?php the_content(); ?></div>
                <?php echo wp_link_pages(); ?>

                <ul class="recent-posts">

                    <h3 class="recent-posts__title">Ostatnie wpisy</h3>

                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 4,
                        'post_status' => 'publish'
                    ));
                    foreach ($recent_posts as $post_item) : ?>
                        <li>
                            <a href="<?php echo get_permalink($post_item['ID']) ?>">
                                <?php echo get_the_post_thumbnail($post_item['ID'], 'full'); ?>
                                <p class="recent-posts__post-title"><?php echo $post_item['post_title'] ?></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endwhile; ?>

        <?php else : ?>

            <p>No posts found. :(</p>

        <?php endif; ?>



    </section>

</main>

<?php get_footer(); ?>