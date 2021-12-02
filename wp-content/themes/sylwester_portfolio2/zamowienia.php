<?php
/*
Template Name: Zamowienia
*/
get_header();
?>

<section id="content">
  <?php if (current_user_can('editor') || current_user_can('administrator')) {  ?>
    <div id="breadcrumbs">
      <ul>
        <li><a href="<?php echo get_home_url(); ?>">Strona główna</a></li>
        <li><i class="fa fa-angle-right"></i></li>
        <li><a href="<?php echo get_permalink($post->ID); ?>">Zamówienia</a></li>
      </ul>
      <div class="like hide-on-med-and-down">
        <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
      </div>
    </div>

    <div class="content">
      <div class="title">
        <h1><?php the_title(); ?></h1>
      </div>
      <div class="calendar">
        <table id="orders">
          <thead>
            <tr class="event order">
              <th>Nazwa zawodów</th>
              <th>Nr startowy</th>
              <th>Klient</th>
              <th>Produkt</th>
              <th>Uwagi</th>
              <th>Wysłano email</th>
              <th>Do zapłaty</th>
              <th>Przyjęto dnia</th>
              <th>Zapłacono dnia</th>
              <th>Wysłano dnia</th>
              <th>Opcje</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $temp = $wp_query;
            $args = array(
              'post_type' => 'zamowienia',
              'orderby' => 'data',
              'order' => 'DESC'
            );

            $the_query = new WP_Query($args);

            while ($the_query->have_posts()) : $the_query->the_post();

              $competitions = get_field('nazwa_zawodow');
              $start_number = get_field('nr_startowy');
              $client = get_field('klient');
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
              echo "<td>";
              echo "<a href='" . get_post_permalink($competitions[0]) . "'>" . get_the_title($competitions[0]) . "</a></td>";
              echo "<td>" . $start_number . "</td>";
              echo "<td>";
              echo "<a href='" . get_post_permalink($client[0]) . "'>" . get_the_title($client[0]) . "</a></td>";
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

    </div>
  <?php } ?>
</section>

<script>
  new Tablesort(document.getElementById('orders'));
</script>

<?php get_footer(); ?>