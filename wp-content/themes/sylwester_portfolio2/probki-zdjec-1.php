<?php
/*
Template Name: Probki zdjec 1
*/
get_header();
?>


<section id="content" class="probki-zdjec">

    <h1 class="page-title"><?php pll_e('Próbki zdjęć') ?></h1>

    <div class="content">


        <?php if (pll_current_language() == 'pl') { ?>

            <div class="gallery">

                <?php

                $url = $_SERVER["REQUEST_URI"];
                $dir = str_replace('/probki-zdjec-1/?=', '', $url);


                $directory = "./././probki_zdjec/" . $dir;
                $handle = opendir($directory);


                while (false !== ($entry = readdir($handle))) {

                    //thumbnail   
                    $img_dir = $directory . '/' . $entry . '/';
                    $files = scandir($img_dir);
                    if ($files[2] == null) {
                        break;
                    }
                    $img_source = 'http://' . $_SERVER["HTTP_HOST"] . '/probki_zdjec/' . $dir . '/' . $entry . '/' . $files[2];


                    //cat
                    if (strpos($entry, 'cat') !== false) {
                        $category_id = 'category';
                    }

                    //link
                    $link = '/probki-zdjec-2/?=' . $dir . '/' . $entry;
                    $link = str_replace('//', '/', $link);


                ?>

                    <div class="box">
                        <div class="boxInner">
                            <a href="<?php echo $link ?>">

                                <img class="lazy" id="<?php echo $category_id ?>" data-original="<?php echo $img_source ?>" alt="<?php $entry ?>">
                                <div class="titleBox">
                                    <div class="titleName"><?php echo $entry ?></div>
                                    <span class="more">Więcej<i class="fa fa-angle-right"></i></span>
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
                $dir = str_replace('/en/sample-photos-1/?=', '', $url);


                $directory = "./././probki_zdjec/" . $dir;
                $handle = opendir($directory);


                while (false !== ($entry = readdir($handle))) {

                    //thumbnail   
                    $img_dir = $directory . '/' . $entry . '/';
                    $files = scandir($img_dir);
                    if ($files[2] == null) {
                        break;
                    }
                    $img_source = 'http://' . $_SERVER["HTTP_HOST"] . '/probki_zdjec/' . $dir . '/' . $entry . '/' . $files[2];


                    //cat
                    if (strpos($entry, 'cat') !== false) {
                        $category_id = 'category';
                    }

                    //link
                    $link = '/en/sample-photos-2/?=' . $dir . '/' . $entry;
                    $link = str_replace('//', '/', $link);


                ?>

                    <div class="box">
                        <div class="boxInner">
                            <a href="<?php echo $link ?>">

                                <img class="lazy" id="<?php echo $category_id ?>" data-original="<?php echo $img_source ?>" alt="<?php $entry ?>">
                                <div class="titleBox">
                                    <div class="titleName"><?php echo $entry ?></div>
                                    <span class="more">Read more<i class="fa fa-angle-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>


                <?php } ?>
            </div>






        <?php  } ?>





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
</script>



<?php get_footer(); ?>