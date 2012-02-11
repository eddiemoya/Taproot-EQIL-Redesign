<?php

/**
 * @package WordPress
 * @subpackage Birthday Club
 */

// add_theme_support('post-thumbnails');


if (function_exists('register_sidebar')) {
    
    register_sidebar(array(
        'name' => 'Sidebar',
        'description' => 'Sidebar for test theme',
        'before_widget' => '<div class="widget %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ));
}



function enqueue_scripts() {
    if (!is_admin()) { // do not enqueue on admin pages
        
        $template_directory =  get_template_directory_uri();
        
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
        wp_enqueue_script('jquery');
        
        
        wp_register_script('eqil_js', $template_directory . '/js/eqil.js');
        wp_enqueue_script('eqil_js');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');



function enqueue_styles() { 
    wp_register_style('eqil-styles', get_stylesheet_uri());
    //wp_enqueue_style( 'eqil-styles');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');
/**
 *  2012-01-22 AVC
 * Without the call to register_nav_menus, the wp-admin > Appearance > Menus page >
 * Theme Locations section will show that "The current theme does not natively support 
 * menus..."
 */
function register_my_menus() {
    register_nav_menus(
        array('main-navigation' => __( 'Main Navigation' ) )
    );
}

add_action( 'init', 'register_my_menus' );
