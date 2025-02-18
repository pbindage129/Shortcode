<?php

 * Define Constants
 */
define( 'CHILD_THEME_ZYLOGCOMPOSITES_VERSION', '1.3.27' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'zylogcomposites-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ZYLOGCOMPOSITES_VERSION, 'all' );

	wp_enqueue_style( 'swiper-css', get_stylesheet_directory_uri() . '/assets/css/swiper-bundle.css');

	wp_enqueue_script( 'swiper-js', get_stylesheet_directory_uri() . '/assets/js/swiper-bundle.js', array('jquery'));

	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery', 'magnific-js','swiper-js'));

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

require get_stylesheet_directory(). '/include/shortcode/latest-post.php';

require get_stylesheet_directory(). '/include/post-type/sustainability-slide.php';

require get_stylesheet_directory(). '/include/shortcode/sustainability-slide.php';

require get_stylesheet_directory(). '/include/shortcode/product-table.php';

require get_stylesheet_directory(). '/include/post-type/products.php';
