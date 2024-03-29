<div class="m-flex-contenu_hightlight <?php echo $class_css ?>">
    
    <div class="grid sm:grid-cols-<?php echo ($variation == 'big') ? '18' : '16' ?>">
        <div class="sm:col-span-16 highlight-texte">
            <?php echo Helper::the_content($bloc['contenu']); ?>
        </div>
    </div>

</div>