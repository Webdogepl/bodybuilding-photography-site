<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>


    <?php $og_image = wpse207895_featured_image(); ?>


    <meta property="og:title" content="<?php wp_title('') ?>" />
    <meta property="og:description" content="Strona poświęcona fotografii kulturystyki i fitness. Zdjęcia z zawodów na płycie DVD, indywidualne sesje zdjęciowe." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="sylwesterszymczuk.com" />
    <meta property="og:site_name" content="Sylwester Szymczuk Photography" />
    <meta property="og:image" content="<?php echo $og_image ?>" />

    <title>Sylwester Szymczuk Photography</title>
    <meta name="Description" content="Strona poświęcona fotografii kulturystyki i fitness. Zdjęcia z zawodów na płycie DVD, indywidualne sesje zdjęciowe." />
    <meta name="Keywords" content="Sylwester Szymczuk, kulturystyka, fotografia, photography, Sylwester Szymczuk Photography, fitness, sesje zdjęciowe, zdjęcia z zawodów, body building, body building photography" />

    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon">

    <meta charset="UTF-8">



    <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.min.css" media="screen,projection" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />




    <?php
    global $post;
    wp_head(); ?>

</head>

<body class="<?php echo 'page-id-' . $post->ID ?>">

    <header class=" nav-wrapper">
        <div class="container">
            <div class="row">

                <a class="open-mobile-menu button-collapse top-nav mobile left"><i class="fas fa-bars"></i></a>
                <div class="logo">
                    <a href="<?php bloginfo('url'); ?>" class="brand-logo">
                        <img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="Sylwester Szymczuk Photography" />
                    </a>
                </div>

                <div class="menu">

                    <ul class="menu-large large">

                        <li class="lang-switcher"><a href="https://sylwesterszymczuk.com"><img src="/wp-content/themes/sylwester_portfolio2/img/pl_PL.png"></a></li>
                        <li class="lang-switcher"><a href="https://sylwesterszymczuk.com/en/home"><img src="/wp-content/themes/sylwester_portfolio2/img/en_US.png"></a></li>

                        <?php if (pll_current_language() == 'pl') { ?>

                            <li><a href="<? pll_e('/probki-zdjec') ?>"><?php pll_e('Próbki zdjęć') ?></a></li>
                            <li><a href="<?php pll_e('/reportaze') ?>"><?php pll_e('Reportaże') ?></a></li>
                            <li><a href="<?php pll_e('/oferta') ?>"><?php pll_e('Oferta') ?></a></li>
                            <li><a href="<?php pll_e('/kulturystyka-i-fitness/sesje-bb-2/') ?>"><?php pll_e('Sesje zdjęciowe') ?></a></li>
                            <li class="open-kalendarium"><a href="#kalendarium"><?php pll_e('Kalendarium') ?></a></li>
                            <li><a href="<?php pll_e('/#kontakt') ?>"><?php pll_e('Kontakt') ?></a></li>

                        <?php } else { ?>

                            <li><a href="<? pll_e('/probki-zdjec') ?>"><?php pll_e('Próbki zdjęć') ?></a></li>
                            <li><a href="<?php pll_e('/reportaze') ?>"><?php pll_e('Reportaże') ?></a></li>
                            <li><a href="<?php pll_e('/#kontakt') ?>"><?php pll_e('Kontakt') ?></a></li>

                        <?php } ?>

                    </ul>

                    <div class="menu-mobile-overlay">
                        <ul class="menu-mobile mobile">

                            <li class="lang-switcher">
                                <a href="https://sylwesterszymczuk.com"><img src="/wp-content/themes/sylwester_portfolio2/img/pl_PL.png"></a>
                                <a href="https://sylwesterszymczuk.com/en/home"><img src="/wp-content/themes/sylwester_portfolio2/img/en_US.png"></a>
                            </li>

                            <li><a href="<?php pll_e('/probki-zdjec') ?>"><?php pll_e('Próbki zdjęć') ?></a></li>
                            <li><a href="<?php pll_e('/reportaze') ?>"><?php pll_e('Reportaże') ?></a></li>
                            <li><a href="<?php pll_e('/oferta') ?>"><?php pll_e('Oferta') ?></a></li>
                            <li><a href="<?php pll_e('/kulturystyka-i-fitness/sesje-bb-2/') ?>"><?php pll_e('Sesje zdjęciowe') ?></a></li>
                            <li class="open-kalendarium"><a><?php pll_e('Kalendarium') ?></a></li>
                            <li><a href="<?php pll_e('/#kontakt') ?>"><?php pll_e('Kontakt') ?></a></li>
                            <li class="close-mobile-menu"><a><i class="fas fa-times"></i></a></li>

                        </ul>
                    </div>

                </div>


                <div class="contact">
                    <a href="tel:+48 531 247 678" class="phone"><i class="fa fa-phone"></i>
                        <p class="hide-on-small-and-down">+48 531 247 678</p>
                    </a>
                    <a href="https://www.facebook.com/Sszymczuk" target="_blank"><i class="fa fa-facebook"></i></a>
                </div>

            </div>
        </div>



    </header>