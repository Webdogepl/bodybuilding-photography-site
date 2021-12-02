<?php
/*
Template Name: Probki zdjec 2
*/

error_reporting(0);
get_header();
?>


<section id="content" class="probki-zdjec">
    <h1 class="page-title"><?php pll_e('Próbki zdjęć') ?></h1>

    <div class="content">

        <?php if (pll_current_language() == 'pl') { ?>

            <div class="gallery">


                <?php



                $url = $_SERVER["REQUEST_URI"];
                $dir = str_replace('/probki-zdjec-2/?=', '', $url);


                $tokens = explode('/', $url);
                $tokens = str_replace('?=', '', $tokens);

                $category_url = $tokens[sizeof($tokens) - 2] . '/' . '#category';

                ?>

                <?php if (pll_current_language() == 'pl') { ?>
                    <div class="alert"><i class="fa fa-exclamation-circle"></i>Uwaga! To nie są wszystkie Twoje zdjęcia. Resztę zdjęć znajdziesz w katalogach porównań kategorii. <a href="<?php echo '/probki-zdjec-1/?=' . $category_url ?>">Kliknij tutaj</a>, aby zobaczyć więcej swoich zdjęć.</div>
                <?php } else { ?>

                    <div class="alert"><i class="fa fa-exclamation-circle"></i>Warning! That's not all your photos. Rest of them you can find in category comparsions. <a href="<?php echo '/sample-photos-1/?=' . $category_url ?>">Click here</a> to find more.</div>

                <?php } ?>

                <?php


                $directory = "./././probki_zdjec/" . $dir;
                $handle = opendir($directory);


                while (false !== ($entry = readdir($handle))) {


                    $img_dir = $directory . '/' . $entry . '/';
                    $files = scandir($img_dir);

                    $img_source = 'http://' . $_SERVER["HTTP_HOST"] . '/probki_zdjec/' . $dir . '/' . $entry . '/' . $files[2];

                ?>

                    <div class="box">
                        <div class="boxInner">
                            <a href="<?php echo 'http://' . $_SERVER["HTTP_HOST"] . '/probki_zdjec/' . $dir . '/' . $entry ?>">

                                <img class="lazy" data-original="<?php echo 'http://' . $_SERVER["HTTP_HOST"] . '/probki_zdjec/' . $dir . '/' . $entry ?>" alt="<?php $entry ?>">
                                <div class="titleBox">
                                    <div class="titleName"><?php echo $entry ?></div>
                                </div>
                            </a>
                        </div>
                    </div>


                <?php } ?>
            </div>

        <?php } else { ?>


            <div class="gallery">


                <?php



                $url = $_SERVER["REQUEST_URI"];
                $dir = str_replace('/en/sample-photos-2/?=', '', $url);


                $tokens = explode('/', $url);
                $tokens = str_replace('?=', '', $tokens);

                $category_url = $tokens[sizeof($tokens) - 2] . '/' . '#category';

                ?>

                <?php if (pll_current_language() == 'pl') { ?>
                    <div class="alert"><i class="fa fa-exclamation-circle"></i>Uwaga! To nie są wszystkie Twoje zdjęcia. Resztę zdjęć znajdziesz w katalogach porównań kategorii. <a href="<?php echo '/probki-zdjec-1/?=' . $category_url ?>">Kliknij tutaj</a>, aby zobaczyć więcej swoich zdjęć.</div>
                <?php } else { ?>

                    <div class="alert"><i class="fa fa-exclamation-circle"></i>Warning! That's not all your photos. Rest of them you can find in category comparsions. <a href="<?php echo '/sample-photos-1/?=' . $category_url ?>">Click here</a> to find more.</div>

                <?php } ?>

                <?php


                $directory = "./././probki_zdjec/" . $dir;
                $handle = opendir($directory);


                while (false !== ($entry = readdir($handle))) {


                    $img_dir = $directory . '/' . $entry . '/';
                    $files = scandir($img_dir);

                    $img_source = 'http://' . $_SERVER["HTTP_HOST"] . '/probki_zdjec/' . $dir . '/' . $entry . '/' . $files[2];

                ?>

                    <div class="box">
                        <div class="boxInner">
                            <a href="<?php echo 'http://' . $_SERVER["HTTP_HOST"] . '/probki_zdjec/' . $dir . '/' . $entry ?>">

                                <img class="lazy" data-original="<?php echo 'http://' . $_SERVER["HTTP_HOST"] . '/probki_zdjec/' . $dir . '/' . $entry ?>" alt="<?php $entry ?>">
                                <div class="titleBox">
                                    <div class="titleName"><?php echo $entry ?></div>
                                </div>
                            </a>
                        </div>
                    </div>


                <?php } ?>
            </div>

        <?php } ?>




    </div>
</section>

<script>
    jQuery('.box').eq(0).css('display', 'none');
    jQuery('.box').eq(1).css('display', 'none');

    // IMG OBRAZKÓW W PRÓBKACH
    function galleryCaptionIMG() {
        setInterval(function() {
            if ($(".galleria-image").length > 0) {
                if ($(".galleria-image").eq(0).css("z-index") == 1) {
                    let url = $(".galleria-image").eq(0).find("img").prop("currentSrc");
                    let filename = url.split("/");

                    $(".galleria-info-description").html(filename[filename.length - 1]);
                    $(".galleria-info-description").css("display", "block");
                } else {
                    let url = $(".galleria-image").eq(1).find("img").prop("currentSrc");
                    let filename = url.split("/");

                    $(".galleria-info-description").html(filename[filename.length - 1]);
                    $(".galleria-info-description").css("display", "block");
                }
            }
        }, 300);
    }
    if (window.location.pathname.indexOf('probki') != -1) {
        galleryCaptionIMG()
    }
</script>



<?php get_footer(); ?>