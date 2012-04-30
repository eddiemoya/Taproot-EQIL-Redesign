<<<<<<< HEAD
<?php 
/**
 * @package Featured articles Lite - Wordpress plugin
 * @author CodeFlavors ( codeflavors@codeflavors.com )
 * @version 2.4
 */
?>
<select name="fa-lite-widget-slider">
	<option value=""><?php _e('Choose slider to display');?></option>
    <?php 
		if ( $loop->have_posts() ) : 
			while ( $loop->have_posts() ) : 
				$loop->the_post();
	?>
    <option value="<?php the_ID();?>"<?php if($active == get_the_ID()):?> selected="selected"<?php endif;?>><?php the_title();?></option>
    <?php
			endwhile;
		endif;	
		wp_reset_query();
	?>	
=======
<?php 
/**
 * @package Featured articles Lite - Wordpress plugin
 * @author CodeFlavors ( codeflavors@codeflavors.com )
 * @version 2.4
 */
?>
<select name="fa-lite-widget-slider">
	<option value=""><?php _e('Choose slider to display');?></option>
    <?php 
		if ( $loop->have_posts() ) : 
			while ( $loop->have_posts() ) : 
				$loop->the_post();
	?>
    <option value="<?php the_ID();?>"<?php if($active == get_the_ID()):?> selected="selected"<?php endif;?>><?php the_title();?></option>
    <?php
			endwhile;
		endif;	
		wp_reset_query();
	?>	
>>>>>>> 9bd3861f4a17d2059ec74a68daba6feb66e227a2
</select>