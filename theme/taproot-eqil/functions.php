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


function register_my_menus() {
  register_nav_menus(
    array('site-navigation' => __( 'Site Navigation' ) )
  );
}
add_action( 'init', 'register_my_menus' );