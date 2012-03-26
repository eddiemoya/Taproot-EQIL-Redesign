<?php
/**
 * @package WordPress
 * @subpackage Birthday Club
 */

get_header();
get_sidebar();
if ( have_posts() ) {
	while ( have_posts() ){  
                
		the_post(); 

		get_template_part('post');	
	}
}

if ( is_single() ) { comments_template(); } // Pull in commentss.php if this is a 'single'

get_sidebar('right');
get_footer();

