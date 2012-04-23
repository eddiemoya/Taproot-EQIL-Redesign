<?php
/**
 * @package WordPress
 * @subpackage EQIL
 */
?>


<!-- Display the Title as a link to the Post's permalink. -->
<div class="post" id="post-<?php the_ID(); ?>">
    <h2><?php the_title(); ?></h2>

    <div class="post_content body">
        <?php (!is_singular()) ? the_excerpt() : the_content(); ?>
    </div>

    <div class="post_footer">
        <?php if(!is_singular()): ?>
            <span class="permalink">
                <a href="<?php the_permalink(); ?>">+ Learn More</a>
            </span>
        <?php endif; ?>
    </div>

</div>