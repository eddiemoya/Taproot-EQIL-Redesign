<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

    <!-- start nav -->
    <div id="nav" class="grid_3 alpha prefix_1">
        <a class="logo" href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.eqil.gif"></a>

        <div class="clear"></div>
        <?php
            function endsWith($str, $sub) {
                return (substr($str, strlen($str) - strlen($sub)) === $sub);
            }

            // 2012-01-22 AVC
            // http://codex.wordpress.org/Function_Reference/wp_nav_menu
            // If the menu is NOT defined in wp-admin > Appearance > Menus, 
            // wp_nav_menu will fall back to wp_page_menu. 
            wp_nav_menu(
                array(
                    'menu' => 'Main Navigation',
                    'container_class' => 'rail_box outer nav',
                    'menu_class' => 'rail_box menu level1' . (is_home() || endsWith(get_permalink(), '/home/') ? ' active gradient_offwhite' : '')
                ) 
            ); 
        ?>

    </div>
    <!-- end nav -->

    <!-- start body -->
    <div id="body" class="grid_14">
        <div id="carousel"></div>

        <div id="divider_bar"></div>

        <div class="content">
