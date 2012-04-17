<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

    <!-- start nav -->
    <div id="nav" class="grid_2 alpha">
        <a class="logo" href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.eqil.gif"></a>
    </div>
    <!-- end nav -->

    <!-- start body -->
    <div id="body" class="grid_17">
        <div id="carousel"><?php
        if( function_exists('FA_display_slider') ){
            FA_display_slider(129);
        }
?>
</div>

        <div id="divider_bar"></div>

        <div class="content">
