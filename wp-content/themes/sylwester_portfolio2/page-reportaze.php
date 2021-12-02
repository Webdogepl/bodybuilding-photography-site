<?php

/**
 * Template name: Reportaże
 */

get_header(); ?>


<main>

    <div class="page-container reportaze" id="content">


        <h1 class="page-title"><?php wp_title(''); ?></h1>

        <p class="images-search"><input type=" text" placeholder="<?php pll_e('Szukaj..') ?>"></p>
        <p class="images-search__results-found"><?php pll_e('Znaleziono <span>0</span> pasujących wyników') ?></p>

        <p class="images-search__not-found"><?php pll_e('Nie znaleziono pasujących wyników') ?></p>

        <div class="content">

            <?php
            wp_reset_query();
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>

        </div>
    </div>

</main>


<script>
    (function($) {

        //Wyszukiwarka reportaży
        function imagesSearch_reportages() {
            let input = $(".images-search input");
            let searchText = input.val().toLowerCase();
            let searchWords = searchText.split(" ");

            for (i = searchWords.length; i > 0; i--) {
                if (searchWords[i] == "") {
                    searchWords.pop();
                }
            }

            let images = $(".image_container");

            let resultsFound = $(".images-search__results-found");
            let resultsNumber = $(".box:visible").length;
            let resultsNotFound = $(".images-search__not-found");

            if (searchText.length > 0) {
                $(images).each(function() {
                    let caption = $(this).find(".caption_link").text().toLowerCase();
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


            $('.galleria-info-description').click(function() {
                window.location = '/probki-zdjec';
            })

        }
        setInterval(imagesSearch_reportages, 300);


    })(jQuery);
</script>

<?php get_footer() ?>