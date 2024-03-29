<div class="m-flex-publication-texte <?php echo $class_css ?>">

    <div class="grid sm:grid-cols-<?php echo ($variation == 'big') ? '18' : '16' ?>">
        <?php $publication = $bloc['publication']; ?>

        <?php if($bloc['position'] == 'gauche'): ?>
            <div class="sm:col-span-<?php echo ($variation == 'big') ? '8' : '5' ?>">
                <?php $publication->show_view_thumb(); ?>
            </div>
            <div class="sm:col-span-1"></div>
        <?php endif ?>
            
        <div class="sm:col-span-<?php echo ($variation == 'big') ? '9' : '10' ?>">
            <?php echo Helper::the_content($bloc['contenu']); ?>
        </div>

        <?php if($bloc['position'] == 'droite'): ?>
            <div class="sm:col-span-1"></div>
            <div class="sm:col-span-<?php echo ($variation == 'big') ? '8' : '5' ?>">
                <?php $publication->show_view_thumb(); ?>
            </div>
        <?php endif ?>


    </div>


</div>