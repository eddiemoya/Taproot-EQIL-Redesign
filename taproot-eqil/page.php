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
 
if(has_post_thumbnail()) get_the_post_thumbnail(null, array(190, 960));


get_template_part('templates/page');

$subpages = get_pages(array('parent' => $post->ID, 'hierarchical' => false, 'post_type' => 'page'));

?>
<div id="subpages">
<?php
foreach($subpages as $page){
    //print_r($page);
    get_template_part('templates/subpage');   
    
}
?></div><?php



get_sidebar('right');
get_footer();

