<?php get_header();  ?>

<?php

$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$array = explode("/", $url);
$array = array_filter($array);
$last = end($array);
$last = current(array_slice($array, -1));

global $wpdb;
$title = $wpdb->get_row('SELECT title FROM wp_ngg_gallery WHERE slug = ' . "\"$array[5]\"");

?>

<section id="content">
    <?php if (current_user_can('editor') || current_user_can('administrator')) {  ?>
        <div id="breadcrumbs">
            <ul>
                <li><a href="<?php echo get_home_url(); ?>">Strona główna</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <?php

                echo '<li><a href="' . get_home_url() . '/zamowienia/">Zamówienia</a></li><li><i class="fa fa-angle-right"></i></li>';

                ?>
                <li><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></li>
                <?php
                if ($array[3] == "galeria") {
                    echo '<li><i class="fa fa-angle-right"></i></li><li><a href="' . get_permalink($post->ID) . 'galeria/' . $array[4] . '/' . $array[5] . '/">' . stripslashes($title->title) . '</a></li>';
                }
                ?>
                <?php
                if ($array[6] == "image") {
                    echo '<li><i class="fa fa-angle-right"></i></li><li><a href="http://' . $url . '">' . $array[7] . '</a></li>';
                }
                ?>
            </ul>
            <div class="like hide-on-med-and-down">
                <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
            </div>
        </div>


        <div class="content">
            <div class="title">
                <h1><?php if ($array[3] == "galeria" || $array[6] == "image") {
                        echo stripslashes($title->title);
                    } else {
                        the_title();
                    } ?></h1>
            </div>
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $contest_id = get_the_ID();
                ?>
                <div class="options"><?php echo edit_post_link(); ?><a href="<?php echo get_home_url(); ?>/zamowienia/">Powrót do zamówień</a></div>

                <div class="calendar">
                    <table>
                        <tbody>
                            <tr class="event order">
                                <th>Np</th>
                                <th>Klient</th>
                                <th>Nr startowy</th>
                                <th>Produkt</th>
                                <th>Uwagi</th>
                                <th>Wysłano email</th>
                                <th>Do zapłaty</th>
                                <th>Przyjęto dnia</th>
                                <th>Zapłacono dnia</th>
                                <th>Wysłano dnia</th>
                                <th>Opcje</th>
                            </tr>
                            <?php
                            $temp = $wp_query;
                            $args = array(
                                'post_type' => 'zamowienia',
                                'orderby' => 'data',
                                'order' => 'DESC',
                                'meta_query'        => array(
                                    array(
                                        'key' => 'nazwa_zawodow',
                                        'value' => '"' . $contest_id . '"',
                                        'compare' => 'LIKE'
                                    )
                                )
                            );



                            $the_query = new WP_Query($args);
                            $count = 0;
                            while ($the_query->have_posts()) : $the_query->the_post();
                                $count++;

                                $client = get_field('klient');
                                $start_number = get_field('nr_startowy');
                                $products = get_field('produkt');
                                $notes = get_field('uwagi');
                                $send_email = get_field('wyslano_email');
                                $prize = get_field('do_zaplaty');
                                $show_send_email = $send_email ? 'Tak' : 'Nie';
                                $day_approval = get_field('przyjeto_dnia');
                                $day_pay = get_field('zaplacono_dnia');
                                $day_approval = get_field('przyjeto_dnia');
                                $day_send = get_field('wyslano_dnia');

                                echo '<tr class="event">';
                                echo "<td>" . $count . ".</td>";
                                echo "<td>";
                                echo "<a href='" . get_post_permalink($client[0]) . "'>" . get_the_title($client[0]) . "</a></td>";
                                echo "<td>" . $start_number . "</td>";
                                echo "<td>";
                            ?>
                                <?php if ($products) : ?>
                                    <ul>
                                        <?php foreach ($products as $product) : ?>
                                            <li><?php echo $product; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            <?php
                                echo "</td>";
                                echo "<td>" . $notes . "</td>";
                                echo "<td>" . $show_send_email . "</td>";
                                echo "<td>" . $prize . "</td>";
                                echo "<td>" . $day_approval . "</td>";
                                echo "<td>" . $day_pay . "</td>";
                                echo "<td>" . $day_send . "</td>";
                                echo "<td>";
                                echo edit_post_link();
                                echo "</td>";

                                echo "</tr>";


                            endwhile;

                            ?>
                        </tbody>
                    </table>
                </div>




            <?php endwhile; ?>

        </div>
    <?php } ?>
</section>


<?php get_footer(); ?>