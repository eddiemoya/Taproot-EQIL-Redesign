<?php

/**
 * @package WordPress
 * @subpackage Birthday Club
 */
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


// 2012-01-22 AVC
// Without the call to register_nav_menus, the wp-admin > Appearance > Menus page >
// Theme Locations section will show that "The current theme does not natively support 
// menus..."
function register_my_menus() {
    register_nav_menus(
        array('main-navigation' => __( 'Main Navigation' ) )
    );
}

add_action( 'init', 'register_my_menus' );
