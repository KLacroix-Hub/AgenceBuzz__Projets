<?php 
    $parent = $publication->get_parent();
    $background = ($parent) ? $parent->acf->page_miniatures : $publication->acf->page_miniatures;    
    $theme = ($parent) ? $parent->acf->page_theme : $publication->acf->page_theme;
    if(!isset($label_button)) $label_button = 'Know more';
    else if(!$label_button) $label_button = 'Know more';
?>

<article style="background-image: url('<?php echo $publication->get_page_patterns('petite', 'moyenne') ?>');" 
class="b-radius-30 m-page-thumb c-theme c-theme--<?php echo $theme; ?> <?php echo $class_css ?>">

    <div class="m-page-thumb__content">

        <div>
            <?php if($parent) : ?>
                <div class="headline headline-filter post-title"><?php echo $parent->wp->post_title ?></div>
            <?php endif; ?>

            <h3 class="m-page-thumb__title"><?php echo $publication->wp->post_title ?></h3>
        </div>
        <?php
            View::show('atomes/a-boutton', [
                'class_css' => 'a-boutton--outline a-boutton--white',
                'lien' => View::new_link("Know more", $publication->get_permalink())
            ]);
        ?>

    </div>

</article>