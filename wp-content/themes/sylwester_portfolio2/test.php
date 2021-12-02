<?php

/**
 * Template name: TEST
 */

get_header(); ?>


<section id="content test">

    <h1 class="page-title"><?php pll_e('Próbki zdjęć') ?></h1>

    <p class="images-search"><input type=" text" placeholder="<?php pll_e('Szukaj..') ?>"></p>
    <p class="images-search__results-found"><?php pll_e('Znaleziono <span>0</span> pasujących wyników') ?></p>

    <p class="images-search__not-found"><?php pll_e('Nie znaleziono pasujących wyników') ?></p>

    <div class="content">


        <div class="gallery">


            <?php

            $directory = "./././probki_zdjec/";
            $handle = opendir($directory);



            while (false !== ($entry = readdir($handle))) {

                $img_source = 'http://' . $_SERVER["HTTP_HOST"] . '/probki_zdjec' . '/' . $entry . '/' . 'miniaturka.jpg';



                if (file_exists('./././probki_zdjec/' . $entry . '/tytul.txt')) {
                    $title = fopen('./././probki_zdjec/' . $entry . '/tytul.txt', "r");
                    $title_read = fread($title, 9999);
                } else $title_read = $entry;

            ?>

                <div class="box">
                    <div class="boxInner">
                        <a href="<?php echo pll_e('/probki-zdjec-1/?=') . $entry ?>">
                            <img class="lazy" onerror="imgError(this)" data-original=" <?php echo $img_source ?>" alt="<?php $entry ?>">
                            <div class="titleBox">
                                <div class="titleName"><?php echo $title_read ?></div>
                                <span class="more"><?php pll_e('Więcej') ?><i class="fa fa-angle-right"></i></span>
                            </div>
                        </a>
                    </div>
                </div>


            <?php } ?>
        </div>
    </div>
</section>

<script>
    jQuery('.box').eq(0).css('display', 'none');
    jQuery('.box').eq(1).css('display', 'none');

    function imgError(image) {
        image.onerror = "";
        let new_src = '/wp-content/themes/sylwester_portfolio2/img/logo.png';
        image.src = new_src;
    }


    var list = jQuery('.gallery');
    var listItems = list.children('.box');
    list.append(listItems.get().reverse());
</script>

<?php get_footer(); ?>