<article class="m-service-thumb b-radius-30 <?php echo $class_css ?>">
    <?php $logo = $publication->acf->service_logo; ?>
    <?php if($logo): ?>
        <img src="<?php echo Image::get_url($logo, 'petite') ?>" alt="Logo <?php echo $service['titre'] ?>">
    <?php endif ?>
    <div class="container-bottom">
        <h3 class="body body-lg"><?php echo $publication->wp->post_title; ?></h3>
        <p class="body body-sm"><?php echo $publication->acf->service_description ?></p>

        <?php
            if($lien = $publication->acf->service_lien) : 
                View::show('atomes/a-boutton', [
                    'class_css' => 'a-boutton--outline',
                    'lien' => $lien
                ]);
            endif;
        ?>
    </div>
</article>