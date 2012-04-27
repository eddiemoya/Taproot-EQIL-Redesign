<?php
/**
 * @package WordPress
 * @subpackage EQIL
 */
global $page, $count;

$class = (($count+1) % 3 == 0) ? 'omega' : '';
$class = (($count+1) % 4 == 0 || $count == 0) ? 'alpha' : $class;
?>

<!-- Display the Title as a link to the Post's permalink. -->
<div class="post grid_5 <?php echo $class; ?>" id="post-<?php the_ID(); ?>">
    <h2><?php echo $page->post_title; ?></h2>
    
    <div class="post_content">
        <div class="postmeta">
        <?php if(has_post_thumbnail($page->ID)) get_the_post_thumbnail($page->ID, array(100, 100));?>
        </div>

    
        <?php echo excerpt(40, $page->post_content);?>
    </div>


</div>