<section class="o-home-bloc-video c-theme c-theme--blue <?php echo $class_css ?>">

    <div class="grid sm:grid-cols-24">
        <div class="sm:col-span-2"></div>
        <div class="sm:col-span-12">
            <a href="<?php echo $page->acf->home_video['url']; ?>" class="glightbox">
                <?php $miniature = $page->acf->home_miniature; ?>
                <div class="video-container">
                    <?php // tu peux changer la taille de l'image  à 'grande' si la qualité est pas bonne ?>
                    <img class="thumbnail b-radius-50" src="<?php echo Image::get_url($miniature,'moyenne'); ?>" alt="<?php echo Image::get_alt($miniature); ?>">
                    <div class="play-button">
                    <img src="<?php echo Image::get_url_from_theme('play-btn.svg') ?>" />
                    </div>
                </div>
            </a>

        </div>
        <div class="sm:col-span-1"></div>
        <div class="sm:col-span-7 o-home-bloc-video__container">
            <h2 class="headline headline-md"><?php echo $page->acf->home_video_titre; ?></h2>
            <div class="body body-md o-home-bloc-video__description">
                <?php echo Helper::the_content($page->acf->home_video_description); ?>
            </div>
            <?php
                View::show('atomes/a-boutton', [
                    'class_css' => 'a-boutton--orange',
                    'lien' => $page->acf->home_video_lien
                ]);
            ?>
        </div>
        <div class="sm:col-span-2"></div>
    </div>

</section>