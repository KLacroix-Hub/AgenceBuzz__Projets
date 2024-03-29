<div class="m-customer-journey-hero <?php echo $class_css ?>">

    <?php $query = Persona::query_by_custumer_journey([$post->wp->ID]);  ?>
    <?php if ($query && $query->have_posts()): ?>
        <ul class="m-customer-journey-hero__list">
        <?php foreach ($query->crocus as $index => $persona): ?>
            <li class="body body-tab">
                <a href="<?php echo $persona->get_permalink(); ?>">
                    <?php echo $persona->wp->post_title; ?>
                </a>
                <?php if ($index < $query->count_posts - 1) { echo ','; } ?>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</div>