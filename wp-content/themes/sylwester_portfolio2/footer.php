<?php wp_footer(); ?>

<footer>

    <p>© Copyright 2021 SYLWESTER SZYMCZUK</p>
    <ul class="footer-menu large">
        <a href="<?php pll_e('/probki-twoich-zdjec') ?>">
            <li><?php pll_e('Próbki zdjęć') ?></li>
        </a>
        <a href="<?php pll_e('/reportaze') ?>">
            <li><?php pll_e('Reportaże') ?></li>
        </a>
        <a href="<?php pll_e('/oferta') ?>">
            <li><?php pll_e('Oferta') ?></li>
        </a>
        <a href="<?php pll_e('/sesje-zdjeciowe') ?>">
            <li><?php pll_e('Sesje zdjęciowe') ?></li>
        </a>
        <a href="#kalendarium">
            <li class="open-kalendarium"><?php pll_e('Kalendarium') ?></li>
        </a>

        <a href="/#kontakt">
            <li><?php pll_e('Kontakt') ?></li>
        </a>
    </ul>




    <div class="kalendarium" id="kalendarium-box">

        <h2 class="kalendarium-title"><?php pll_e('Kalendarium') ?></h2>

        <i class="fas fa-times close-kalendarium"></i>

        <p class="kalendarium-desc"><?php pll_e('Zawody na których będę w najbliższym czasie') ?></p>

        <div class="kalendarium__content"><?php echo the_field('zawody', 1203) ?></div>

    </div>



</footer>



<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-42952903-1', 'sylwesterszymczuk.com');
    ga('send', 'pageview');



    jQuery('.close-mobile-menu').click(function() {
        jQuery('.menu-mobile-overlay').slideUp();
        jQuery('.menu-mobile').fadeOut();
    });

    jQuery('.open-mobile-menu').click(function() {
        jQuery('.menu-mobile').fadeIn();
        jQuery('.menu-mobile-overlay').slideDown();

    });
</script>

</body>

</html>