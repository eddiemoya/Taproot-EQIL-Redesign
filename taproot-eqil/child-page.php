<?php

get_header();     
get_sidebar();
the_post();
 
$news = get_post(array(
    'category' => get_queried_object()->term_id,
    'numberposts' => 1
    ));

get_template_part('templates/news');
get_template_part('templates/post');

get_sidear('right');
get_footer();

