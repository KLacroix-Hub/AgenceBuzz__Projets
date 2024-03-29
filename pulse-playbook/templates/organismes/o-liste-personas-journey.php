<section class="o-liste-personas-journey <?php echo $class_css ?>">

    <?php View::show('organismes/o-flexs', ['page' => $page]); ?>

    <div class="js-post-container grid sm:grid-cols-<?php echo $cols ?> gap-20">

        <?php if($query->have_posts()) : ?>
            <?php foreach ($query->crocus as $publication) : ?>
                <?php $publication->show_view_thumb(); ?>
            <?php endforeach ?>
        <?php endif ?>

    </div>

</section>

