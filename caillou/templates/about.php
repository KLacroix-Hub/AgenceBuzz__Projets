<?php get_header(); 
/* Template Name: TPL about */
?>

<section class="main-about">
    <div class="main-about__texte headline headline-sm">
        <?php the_content() ?>
    </div>
    <div class="main-about__texte-second headline headline-md">
    <svg width="72" height="71" viewBox="0 0 72 71" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="Group 246">
        <path id="Rectangle 209" d="M2.16797 68.832L69.668 68.832L69.668 22.668" stroke="black" stroke-width="4.03155" stroke-linejoin="round"/>
        <path id="Vector 28" d="M68.664 69.164L2 2" stroke="black" stroke-width="4.03155" stroke-linejoin="round"/>
        </g>
    </svg>
        <p class="headline"><?php echo the_field('about_second_txt') ?></p>
    </div>
    <div class="about-lists">
        <?php if(have_rows("about_list")) :
                while(have_rows("about_list")): the_row();?>
                    <div class="about-lists__item">
                        <h4 class="about-list-title headline headline-lg"><?php echo the_sub_field("about_list_titre") ?></h4>
                        <img class="about-list-image" src="<?php echo the_sub_field('about_list_image') ?>" />
        </div>
                <?php endwhile;
            endif;?>
        </div>
    <div class="main-about__texte headline headline-sm">
        <?php echo the_field('about_troisieme_txt') ?>
    </div>
    <p class="main-about__futur headline headline-sm">Êtes-vous ma prochaine aventure ?</p>
</section>

<?php get_footer(); ?>