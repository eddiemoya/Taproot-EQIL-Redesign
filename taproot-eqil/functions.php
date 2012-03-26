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
        'beforr_widge_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ));
    
   register_sidebar(array(
        'name' => 'Right Sidebar',
        'description' => 'Sidebar on the right side of the page',
        'before_widget' => '<div class="rail_box inner gradient_offwhite widget %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="header widgettitle">',
        'after_title' => '</div>'
    ));
}



add_action('wp_print_styles', 'enqueue_styles');
function enqueue_styles() {
    
    if (!is_admin()) { // do not enqueue on admin pages

        $style_dir = get_template_directory_uri() . '/css/';
        
        //wp_deregister_script('jquery'); 
        //wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), '1.7.1');
        //wp_enqueue_script('jquery');
        
        wp_register_style('eqil_css_reset',    $style_dir . 'reset.css', array(), 1);
        wp_enqueue_style('eqil_css_reset');
        
        wp_register_style('eqil_css_text',     $style_dir . 'text.css', array('eqil_css_reset'), 1);
        wp_enqueue_style('eqil_css_text');    
        
        wp_register_style('eqil_css_24_col',   $style_dir . '960_24_col.css', array('eqil_css_text'), 1);
        wp_enqueue_style('eqil_css_24_col'); 
        
        wp_register_style('eqil_css_sticky_footer', $style_dir . 'sticky_footer.css', array('eqil_css_24_col'), 1);
        wp_enqueue_style('eqil_css_sticky_footer'); 
        
        wp_register_style('eqil_css_main',     $style_dir . 'main.css', array('eqil_css_sticky_footer'), 1);
        wp_enqueue_style('eqil_css_main'); 
        
        wp_register_style('eqil_css_nav',      $style_dir . 'nav.css', array('eqil_css_main'), 1);
        wp_enqueue_style('eqil_css_nav'); 
        
        wp_register_style('eqil_css_modules',   $style_dir . 'modules.css', array('eqil_css_nav'), 1);
        wp_enqueue_style('eqil_css_modules'); 
       
    }
}

function register_my_menus() {
    register_nav_menus(
        array('main-navigation' => __( 'Main Navigation' ) )
    );
}
add_action( 'init', 'register_my_menus' );
