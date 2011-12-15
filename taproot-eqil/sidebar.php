<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!--<div class="navigation">
        <div class="alignleft"><?php //next_posts_link('&laquo; Older Entries') ?></div>
        <div class="alignright"><?php //previous_posts_link('Newer Entries &raquo;') ?></div>
</div>-->

<!--<div style="clear:both;"></div>
        </div>  #content
            <div id="sidebar">
                <h1>SIDEBAR</h1>
                <ul>
                    <?php 	/* Widgetized sidebar, if you have the plugin installed. */
//                        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) :
//                        endif;
                    ?>
                </ul>
            </div>-->

    <!-- start nav -->
    <div id="nav" class="grid_3 alpha prefix_1">
        <a class="logo" href="."><img src="<?php echo get_template_directory_uri(); ?>/img/logo.eqil.gif"></a>

        <div class="clear"></div>

        <div class="rail_box outer nav">
            <ul class="rail_box menu level1 active gradient_offwhite">
                <li><a class="active" href=".">Home</a></li>
                <li><a href=".">Issues</a></li>
                <li><a href=".">Get Involved</a></li>
                <li><a href=".">News & Media</a></li>
                <li><a href=".">Events</a></li>
                <li><a href=".">Our Work</a></li>
                <li><a href=".">Resources</a></li>
                <li><a href=".">About Us</a></li>
                <?php wp_nav_menu( array( 'theme_location' => 'site-navigation' ) ); ?>
            </ul>

    <!-- start nav -->
            
        </div>
    </div>
    <!-- start body -->
    <div id="body" class="grid_14">
        <div id="carousel"></div>

        <div id="divider_bar"></div>

        <div class="content">
    <!-- end nav -->

    <!-- required for sticky footer -->
