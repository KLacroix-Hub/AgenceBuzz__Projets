<div class="m-flex-video <?php echo $class_css; ?>">

    <div class="grid sm:grid-cols-<?php echo ($variation == 'big') ? '18' : '16' ?>">
        <?php $miniature = $bloc['miniature']; ?>

        <?php if($bloc['position_video'] == 'gauche'): ?>
            <div class="sm:col-span-<?php echo ($variation == 'big') ? '9' : '10' ?>">
                <?php echo Helper::the_content($bloc['contenu']); ?>
            </div>
            <div class="sm:col-span-1"></div>
        <?php endif ?>
        
        <div class="sm:col-span-<?php echo ($variation == 'big') ? '8' : '5' ?>">
            <a href="<?php echo $bloc['video_fichier']['url']; ?>" class="glightbox">
                <div class="video-container">
                    <?php // tu changer la taille de l'image  à 'grande' si la qualité est pas bonne ?>
                    <img class="b-radius-30" src="<?php echo Image::get_url($miniature,'moyenne'); ?>" alt="<?php echo Image::get_alt($miniature); ?>">
                    <img class="play-btn" src="<?php echo Image::get_url_from_theme("play-btn.svg") ?>"/>
                </div>
            </a>
        </div>

        <?php if($bloc['position_video'] == 'droite'): ?>
            <div class="sm:col-span-1"></div>
            <div class="sm:col-span-<?php echo ($variation == 'big') ? '9' : '10' ?>">
                <?php echo Helper::the_content($bloc['contenu']); ?>
            </div>
        <?php endif ?>


    </div>
  

</div>