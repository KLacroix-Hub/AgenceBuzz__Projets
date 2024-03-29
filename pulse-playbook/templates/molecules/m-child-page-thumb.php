<div class="m-child-page-thumb b-radius-36 c-theme c-theme--vert <?php echo $class_css ?>">

    <div class="m-child-page-thumb__prevnext headline headline-filter">
        <img src="<?php echo Image::get_url_from_theme($icon) ?>" alt=""> 
        <?php echo $label; ?>
    </div>

    <h3><?php echo $page->wp->post_title; ?></h3>

    <?php 

        View::show('atomes/a-boutton', [
            'class_css' => 'a-boutton--outline',
            'lien' => View::new_link('Know more', $page->get_permalink()),
        ]);

    ?>

</div>