<?php


if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(285, 285, true); // default Post Thumbnail dimensions   
}


add_theme_support('woocommerce');



function wpa_filter_nav_menu_objects($items)
{
    foreach ($items as $key => $item) {
        if ('2415' == $item->ID && !current_user_can('administrator')) {
            unset($items[$key]);
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpa_filter_nav_menu_objects');

// To change add to cart text on single product page
add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text');
function woocommerce_custom_single_add_to_cart_text()
{
    return __('Zamów', 'woocommerce');
}

// To change add to cart text on product archives(Collection) page
add_filter('woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text');
function woocommerce_custom_product_add_to_cart_text()
{
    return __('Zamów', 'woocommerce');
}


function load_scripts()
{

    wp_enqueue_script('addons', get_template_directory_uri() . '/js/min/main.min.js');
}

add_action('wp_enqueue_scripts', 'load_scripts');


/**
 * Redirect users after add to cart.
 */
function my_custom_add_to_cart_redirect($url)
{

    $url = wc_get_cart_url();

    return $url;
}
add_filter('woocommerce_add_to_cart_redirect', 'my_custom_add_to_cart_redirect');





add_filter('woocommerce_checkout_fields', 'wpb_custom_additional_info');
function wpb_custom_additional_info($fields)
{
    if (pll_current_language() == 'pl') {
        $fields['order']['order_comments']['placeholder'] = 'Wpisz nazwę zawodów, z których chcesz otrzymać materiały, kategorię oraz swój numer startowy';
    } else {
        $fields['order']['order_comments']['placeholder'] = 'Write competition name, which you want to receive photos, category and your number';
    }

    return $fields;
}



// cart page return to shop link
add_filter('woocommerce_return_to_shop_redirect', 'tm_get_shop_link');
// continue shopping redirect
add_filter('woocommerce_continue_shopping_redirect', 'tm_get_shop_link');
function tm_get_shop_link()
{
    return get_site_url() . '/oferta';
}


remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);


add_filter('woocommerce_dropdown_variation_attribute_options_args', 'am_change_option_none_text');
function am_change_option_none_text($args)
{
    $args['show_option_none'] = wc_attribute_label($args['attribute']);

    return $args;
}

error_reporting(0);

/*------------------------------ OPEN GRAPH ---------------------------------*/

function add_ogg()
{
    global $post;
    if (!is_front_page()) {
        $og_title = wp_title('');
        if (has_post_thumbnail($post->ID)) {
            $og_image = get_the_post_thumbnail_url('full');
        } else {
            $og_image = get_field('zdjecie_miesiaca', 1203);
        }
    } else {
        $og_title = "Sylwester Szymczuk Photography";
        $og_image =  get_field('zdjecie_miesiaca', 1203);
    }
}

function wpse207895_featured_image()
{
    if (is_singular()) {

        $id = get_queried_object_id();

        if (has_post_thumbnail($id)) {

            $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');

            $url = $image[0];
        } else {

            $url = get_field('zdjecie_miesiaca', 1203);
        }
    }

    return $url;
}



// Order additional notes required
add_filter('woocommerce_checkout_fields', 'wc_override_checkout_fields');
function wc_override_checkout_fields($fields)
{
    $fields['order']['order_comments']['required'] = true;
    return $fields;
}
