<?php get_header(); 
/* Template Name: TPL Contact */
?>

<section class="main-contact">
    <div class="main-contact__title">
        <h1 class="headline headline-xl">
                <?php the_title(); ?> 
        </h1>
        <?php if ( get_field('contact_subtitle') ) : ?>
          <p class="headline headline-sm"><?php the_field('contact_subtitle');?></p>
        <?php endif; ?>
    </div>
    
    <div class="wrapper">

        <div class="main-contact__map">
            <div id="map"></div>
        </div>
        <div class="main-contact__informations">
            <div class="informations">
                <h2 class="headline headline-lg">
                    Téléphone
                </h2>
                <a href='tel:<?php the_field('contact_phone-number') ?>' class="headline headline-sm"><?php the_field('contact_phone-number');?></a>
            </div>
            <div class="informations">
                <h2 class="headline headline-lg">
                    Mail
                </h2>
                <a href='mailto:<?php the_field('contact_mail');?>' class="headline headline-sm"><?php the_field('contact_mail');?></a>
            </div>
            <div class="informations">
                <h2 class="headline headline-lg">
                Où nous retrouver ?
                </h2>
                <p class="headline headline-sm"><?php the_field('contact_adress');?></p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>