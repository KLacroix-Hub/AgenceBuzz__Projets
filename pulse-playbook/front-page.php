<?php get_header(); ?>

<?php
while (have_posts()):
    the_post();
    $page = new Page($post);

    View::show('organismes/o-home-hero', ['page' => $page]);
    View::show('organismes/o-home-highlight-blocs', ['page' => $page]);
    View::show('organismes/o-agenda', ['page' => $page]);
    View::show('organismes/o-home-cases-studies', ['page' => $page]);
    View::show('organismes/o-home-bloc-video', ['page' => $page]);
    View::show('organismes/o-home-bloc-equipe', ['page' => $page]);


endwhile; ?>

<?php get_footer(); ?>

