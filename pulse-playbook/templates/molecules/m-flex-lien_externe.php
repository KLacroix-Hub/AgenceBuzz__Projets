<div class="m-flex-lien_externe <?php echo $class_css ?>">

    <div class="grid sm:grid-cols-<?php echo ($variation == 'big') ? '18' : '16' ?>">

        <?php if($bloc['position_visuel'] == 'gauche'): ?>
            <div class="sm:col-span-<?php echo ($variation == 'big') ? '8' : '5' ?>">
                <img class="b-radius-30" src="<?php echo Image::get_url($bloc['visuel'], 'grande'); ?>" alt="<?php echo Image::get_alt($bloc['visuel']); ?>">
            </div>
            <div class="sm:col-span-1"></div>
        <?php endif ?>

        <div class="sm:col-span-<?php echo ($variation == 'big') ? '9' : '10' ?>">
            <?php echo Helper::the_content($bloc['contenu']); ?>
            <?php
                View::show('atomes/a-boutton', [
                    'class_css' => 'a-boutton--outline',
                    'lien' => $bloc['lien']
                ]);
            ?>
        </div>

        <?php if($bloc['position_visuel'] == 'droite'): ?>
            <div class="sm:col-span-1"></div>
            <div class="sm:col-span-<?php echo ($variation == 'big') ? '8' : '5' ?> ">
                <img class="b-radius-30" src="<?php echo Image::get_url($bloc['visuel'], 'grande'); ?>" alt="<?php echo Image::get_alt($bloc['visuel']); ?>">
            </div>
        <?php endif ?>

    </div>


</div>