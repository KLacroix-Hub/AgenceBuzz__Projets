<?php get_header();
 $projets = get_posts(array(
    'post_type' => 'projets',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC'
    )); 
?>

<main class="main-content">
<div class="main-preenter"> 
    </div>
   <div class="main-content__informations">
        <h2 class="body body-xl">Direction artistique</h2>
        <div class="main-content__informations-contact">
            <a class="body body-xl" href="tel:+33663216091">0663216091</a>
            <a class="body body-xl" href="mailto:camillexcaillou@gmail.com">camillexcaillou@gmail.com</a>
        </div>
        <p class="body body-xl main-content__address">Paris, 75020</p>
   </div>
   <div class="main-content__the-content headline headline-sm">
    <?php the_content(); ?>
   </div>
   <div class="main-content__ctas">
        <span id='bloc-cta' class="active">
        <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.257812" y="0.25" width="9.99556" height="9.99556" stroke="black" stroke-width="0.5"/>
            <rect x="15.7559" y="0.32428" width="9.99398" height="6.39157" stroke="black" stroke-width="0.5"/>
            <rect x="15.751" y="10.1825" width="9.99866" height="15.9582" stroke="black" stroke-width="0.5"/>
            <rect x="0.25" y="13.6375" width="9.99398" height="12.5" stroke="black" stroke-width="0.5"/>
        </svg>

        </span>
        <span id='list-cta'>
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
            <rect x="1.08594" y="0.251608" width="25.6624" height="4.52866" stroke="black" stroke-width="0.503185"/>
            <rect x="1.08599" y="21.3854" width="25.6624" height="4.52866" stroke="black" stroke-width="0.503185"/>
            <rect x="1.08599" y="10.8185" width="25.6624" height="4.52866" stroke="black" stroke-width="0.503185"/>
        </svg>
        </span>
   </div>
   <div class="main-content__projects">
<?php foreach($projets as $projet): ?>
        <div class="project project-bloc">
            <a href="<?php echo get_permalink($projet->ID); ?>">
            <?php 
            $file = get_field("project_home_img",$projet->ID);
            if($file["type"]=="image"): ?>
            <img src="<?php echo $file['url'] ?>" />
            <?php else: ?>
            <video autoplay loop muted>
                <source src="<?php echo $file['url'] ?>" type="video/mp4">
            </video>
            <?php endif; ?>
                <div class="project-bloc-infos">
                    <p class="project-bloc-infos__title body body-xl"><?php echo $projet->post_excerpt; ?></p>
                    <div class="project-bloc-infos__container">
                        <p class="project-bloc-infos__category body body-highlight"><?php echo get_field("project_type",$projet->ID) ?></p>
                        <p class="project-bloc-infos__year body body-highlight"><?php echo get_field("project_year",$projet->ID) ?></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="project-list">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/about-icon.svg" />
            <a class="headline headline-lg" href="<?php echo get_permalink($projet->ID); ?>">
                <?php echo $projet->post_title;?>
                
            </a>    
        </div>
    <?php endforeach; ?>

   </div>
</main>

<?php get_footer(); ?>