<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Taproot EQIL
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html <?php language_attributes(); ?>> 
<head>
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <link rel="canonical" href="<?php bloginfo('url'); ?>"/> 
    <?php wp_head(); ?>
</head> 
<body>
    <div class="container_24 wrapper"> 
        <div id="header_wrapper">
            <div id="header" class="grid_24 alpha omega">
            
                <form class="search grid_5 push_18 alpha" action=".">
                    <input class="text" type="text" name="s">
                        <button class="button" type="submit"><img src="<?php echo get_template_directory_uri(); ?>/img/search.magnify.png"></button>
                </form>
            </div>
        </div>
        <!-- start nav -->
	<div id="nav">
	<?php
	    wp_nav_menu(
	        array('menu' => 'Main Navigation' ) 
	    ); 
	?>
	<!-- end nav -->
	</div>
        <div class="clear"></div>
