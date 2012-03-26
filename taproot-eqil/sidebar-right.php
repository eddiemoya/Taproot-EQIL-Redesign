<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
            </div>
            <!-- end class="content" --> 
        </div>
        <!-- end body -->
    <div id="modules" class="grid_5 omega">
        <div class="rail_box outer">
          <?php 	/* Widgetized sidebar, if you have the plugin installed. */
                if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) :
                endif;
            ?>
        </div>
    </div>
