<?php
/*
Template Name: Oferta
*/
get_header();
?>


<section class="page-oferta">

    <h1 class="page-title"><?php pll_e('OFERTA') ?></h1>

    <p class="skontaktuj-sie"><?php pll_e('Jeśli chcesz zamówić więcej niż jeden pakiet lub indywidualną sesję <a href="#sesja">Skontaktuj się ze mną') ?></a></p>

    <p class="open-kalendarium oferta-kalendarium"><?php pll_e('Możesz zamówić zdjęcia z przyszłych zawodów') ?> <a href="#" class="open-kalendarium"><?php pll_e('Zobacz kalendarium') ?></a></p>

    <div class="offer-products">
        <?php echo do_shortcode('[products columns="4" orderby="menu_order" order="asc"]') ?>
    </div>


    <div id="sesja" class="sesja">

        <div class="sesja-opacity"></div>


        <div class="sesja-left">

            <h2 class="contact-title"><?php pll_e('SESJA FOTOGRAFICZNA') ?></h2>


            <div class="form">
                <p><?php pll_e('Indywidualnie podchodzę do każdej sesji, więc proszę o kontakt telefoniczny (<a href="tel:+48531247678" class="numer"><b>+48 531 247 678</b></a>) lub email.') ?></p>

                <?php echo do_shortcode('[contact-form-7 id="47052"]'); ?>
            </div>

        </div>


        <div class="sesja-right">

            <img src="/wp-content/themes/sylwester_portfolio2/img/sesja-fotograficzna.png" alt="sesja fotograficzna">

        </div>


    </div>




</section>








<script>
    jQuery('.product').last().after('<img class="free-shipping" src="/wp-content/themes/sylwester_portfolio2/img/dostawa.png">');
</script>


<?php get_footer() ?>