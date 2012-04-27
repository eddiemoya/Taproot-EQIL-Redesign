<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
    <!-- start nav -->
    <div id="left-rail  " class="grid_2 alpha">
        <a class="logo" href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.eqil.gif"></a>
    </div>
    <!-- end nav -->
    
    <!-- start body -->
    
    <div id="body" class="grid_17">
        <?php if(is_page()){ ?>
            <h1><?php the_title(); ?></h1>
               <div id="divider_bar"></div> 
        <?php } ?>
        <div class="content">
            <?php do_action('content-top'); ?>
