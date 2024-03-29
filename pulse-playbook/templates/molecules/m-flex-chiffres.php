<section class="m-flex-chiffres <?php echo $class_css; ?>">  
    <div class="grid sm:grid-cols-<?php echo ($variation == 'big') ? '18' : '16' ?>">
        <div class="sm:col-span-<?php echo ($variation == 'big') ? '16' : '14' ?>">
            <div class="grid sm:grid-cols-2 gap-10">
                <?php foreach ($bloc['les_chiffres'] as $key => $chiffre): ?>
                    <article class="m-flex-chiffres-item b-radius-20  c-theme--theming-content  c-theme c-theme--<?php echo $chiffre['theme'] ?>">
                        <h3 class=""><?php echo $chiffre['chiffre']; ?></h3>
                        <p><?php echo Helper::the_content($chiffre['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="sm:col-span-2"></div>
    </div>
</section>