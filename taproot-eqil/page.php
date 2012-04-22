<?php
/**
 * @package WordPress
 * @subpackage Birthday Club
 * 
 * This template is used by the Birthday Gitfts (formerly Gift Suggestions) and 
 * Ages & Stages landing pages. It is used by Birthday Gifts automatically via 
 * the Template Hierarchy, howver for Ages & Stages it must be selected as as 
 * page template
 */

get_header();
get_sidebar();
the_post();
 
get_template_part('templates/post');

get_sidebar('right');
get_footer();

