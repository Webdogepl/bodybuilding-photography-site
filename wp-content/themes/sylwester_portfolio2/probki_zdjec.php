<?php
/*
Template Name: Probki zdjec
*/
get_header();
?>

<section id="content" class="probki-zdjec">

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

                <div class="box <?php echo $entry ?>">
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
    jQuery('.box').eq(0).remove();
    jQuery('.box').eq(0).remove();

    function imgError(image) {
        image.onerror = "";
        let new_src = '/wp-content/themes/sylwester_portfolio2/img/logo.png';
        image.src = new_src;
    }


    var list = jQuery('.gallery');
    var listItems = list.children('.box');
    list.append(listItems.get().reverse());


    (function($) {
        //Wyszukiwarka próbek
        function imagesSearch_samples() {
            let input = $(".images-search input");
            let searchText = input.val().toLowerCase();
            let searchWords = searchText.split(" ");

            for (i = searchWords.length; i > 0; i--) {
                if (searchWords[i] == "") {
                    searchWords.pop();
                }
            }

            let images = $(".box");

            let resultsFound = $(".images-search__results-found");
            let resultsNumber = $(".box:visible").length;
            let resultsNotFound = $(".images-search__not-found");

            if (searchText.length > 0) {
                $(images).each(function() {
                    let caption = $(this).find(".titleName").text().toLowerCase();
                    let caption_words = caption.split("_");

                    for (j = 0; j < searchWords.length; j++) {
                        for (i = 0; i < caption_words.length; i++) {
                            if (caption_words[i].indexOf(searchWords[j]) == -1) {
                                visibility = false;
                            } else {
                                visibility = true;
                                break;
                            }
                        }
                    }

                    if (visibility == true) {
                        $(this).fadeIn();
                    } else {
                        $(this).fadeOut();
                    }
                });
                if (resultsNumber == 0) {
                    $(resultsFound).hide();
                    $(resultsNotFound).css("display", "block").fadeIn();
                } else {
                    $(resultsFound).find("span").text(resultsNumber);
                    $(resultsFound).fadeIn();
                    $(resultsNotFound).hide();
                }
            } else {
                images.fadeIn(500);
                $(resultsFound).fadeOut();
            }
        }
        setInterval(imagesSearch_samples, 300);

        $(window).ready(function() {

            let boxesLength = $('.box').length / 2;

            function sortBoxes() {

                let boxes = $('.box');

                $(boxes).each(function() {
                    let number = $(this).attr('class').split(' ')[1].split('_')[0];
                    let prevSiblingNumber = 9999;
                    if ($(this).prev().attr('class') !== undefined) {
                        prevSiblingNumber = $(this).prev().attr('class').split(' ')[1].split('_')[0];
                    }
                    if (number > prevSiblingNumber) {
                        $(this).insertBefore($(this).prev());
                    }

                })

            }
            for (let i = 0; i < boxesLength; i++) {
                sortBoxes();
            }

        })


    })(jQuery);
</script>

<?php get_footer(); ?>