<?php
/**
 * @package WordPress
 * @subpackage Birthday Club
 */
?>


<!-- Display the Title as a link to the Post's permalink. -->
<div class="post" id="post-<?php the_ID(); ?>">
    <h2><?php the_title(); ?></h2>
    
    <div class="date"><?php the_time('l, M, jS, Y'); ?></div>

    <div class="post_content body">
        <?php (!is_singular()) ? the_excerpt() : the_content(); ?>
    </div>

    <!-- Optional widget section in the post footer-->
    <div class="post_footer">
            <span class="permalink">
                <a href="<?php the_permalink(); ?>">+ Learn More</a>
            </span>
    </div>
    <!-- Display a comma separated list of the Post's Categories. -->

</div>

