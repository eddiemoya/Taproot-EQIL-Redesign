<?php

get_header();     
get_sidebar();
the_post();
 

get_template_part('templates/post');

get_sidebar('right');
get_footer();

