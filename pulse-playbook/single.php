<?php get_header(); ?>

<?php
while (have_posts()):
    the_post();
    $page = new Post($post);
endwhile;

get_footer();

