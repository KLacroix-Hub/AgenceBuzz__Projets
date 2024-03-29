<?php get_header(); 
/* Template Name: TPL about */
?>

<section class="main-about">
    <h1 class="main-about__title headline headline-xl">
        <?php the_title(); ?> 
    </h1>
  <div class="main-about__container">
    <div class="about about-who">
      <div class="about-figure">
        <?php if ( get_field('about_picture_first') ) : ?>
          <img src="<?php the_field('about_picture_first'); ?>" alt="<?php the_field(''); ?>">
        <?php endif; ?>
      </div>
      <div class="about-who__text">
        <h2 class="headline headline-lg">Qui sommes-nous ?</h2>
        <p class="headline headline-sm"><?php the_field('about_who_we_are'); ?></p>
      </div>
    </div>
    <div class="about about-doing">
        <div class="about-doing__text">
          <h2 class="headline headline-lg">Que faisons-nous ?</h2>
          <p class="headline headline-sm"><?php the_field('about_doing'); ?></p>
        </div>
        <div class="about-figure">
        <?php if ( get_field('about_picture_first') ) : ?>
            <img src="<?php the_field('about_picture_second'); ?>" alt="<?php the_field(''); ?>">
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>