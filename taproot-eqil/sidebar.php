<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
    <div id="logo" class="grid_3 alpha prefix_1">
        <a class="logo" href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.eqil.gif"></a>

        <div class="clear"></div>
 
    </div>    <!-- start body -->
    <div id="body" class="grid_14">
        <div id="carousel"><?php
if( function_exists('FA_display_slider') ){
    FA_display_slider(129);
}
?>
</div>

        <div id="divider_bar"></div>

        <div class="content">
