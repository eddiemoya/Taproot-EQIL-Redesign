<?php
/**
 * @package WordPress
 * @subpackage EQIL
 */
global $page;
?>

<!-- Display the Title as a link to the Post's permalink. -->
<div class="post" id="post-<?php the_ID(); ?>">
    <h2><?php echo $page->post_title; ?></h2>
    
    <div class="post_content">
        <div class="postmeta">
        <?php if(has_post_thumbnail($page->ID)) get_the_post_thumbnail($page->ID, array(100, 100));?>
        </div>

    
        <?php echo excerpt(40, $page->post_content);?>
    </div>


</div>