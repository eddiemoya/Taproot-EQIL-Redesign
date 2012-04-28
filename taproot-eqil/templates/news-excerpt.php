<?php
/**
 * @package WordPress
 * @subpackage EQIL
 */
?>


<!-- Display the Title as a link to the Post's permalink. -->
<div class="post news" id="post-<?php the_ID(); ?>">
<!--    <h2><?php the_title(); ?></h2>-->
    
<!--    <div class="date"><?php the_time('l, M, jS, Y'); ?></div>-->

    <div class="post_content body">
        <?php the_excerpt(); ?>
    </div>

    <!-- Optional widget section in the post footer-->
    <div class="post_footer">
            <span class="permalink">
                <a href="<?php the_permalink(); ?>">+ More at News & Media</a>
            </span>
    </div>
    <!-- Display a comma separated list of the Post's Categories. -->

</div>

