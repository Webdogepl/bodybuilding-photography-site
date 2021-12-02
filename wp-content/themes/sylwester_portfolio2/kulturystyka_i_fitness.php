<?php
/*
Template Name: Kulturystyka i fitness
*/
get_header();
?>
    <section id="content">
       <div id="breadcrumbs">
            <ul>
                <li><a href="<?php echo get_home_url(); ?>">Strona główna</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li><a href="<?php echo get_permalink( $post->ID ); ?>">Kulturystyka i Fitness</a></li>
            </ul>
            <div class="like hide-on-med-and-down">
                <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
            </div>            
       </div>
       <div class="content">
            <div class="title">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="categories">
                <ul>
                    <li>
                        <a href="reportaze/">
                            <img src="<?php bloginfo('template_directory'); ?>/img/reportaze.jpg" alt="" />
                            <div class="text">
                               <h3>Reportaże</h3>
                               <p>Relacje z zawodów, Wasze zdjęcia.</p>
                               <span class="more">Więcej <i class="fa fa-angle-right"></i></span>
                            </div>
                        </a>
                    </li>                    
                    <li>
                        <a href="probki-zdjec/">
                            <img src="<?php bloginfo('template_directory'); ?>/img/probki_zdjec.jpg" alt="" />
                            <div class="text">
                               <h3>Próbki zdjęć</h3>
                               <p>Próbki waszych zdjęć z zawodów, zamów na DVD!</p>
                               <span class="more">Więcej <i class="fa fa-angle-right"></i></span>                               
                            </div>                            
                        </a>
                    </li>                    
                    <li class="full">
                        <a href="sesje-bb-2/">
                            <img src="<?php bloginfo('template_directory'); ?>/img/sesje_zdjeciowea.jpg" alt="" class="hide-on-med-and-down"  />
                            <img src="<?php bloginfo('template_directory'); ?>/img/sesje_zdjeciowe.jpg" alt="" class="hide-on-large-only" />
                            <div class="text">
                               <h3>Sesje zdjęciowe</h3>
                               <p>Indywidualne sesje zdjęciowe.</p>
                               <span class="more">Więcej <i class="fa fa-angle-right"></i></span>                               
                            </div>                            
                        </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
       </div>
    </section>            

<?php get_footer(); ?>