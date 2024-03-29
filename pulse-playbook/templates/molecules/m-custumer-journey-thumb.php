<?php 
    $custumer_group = $publication->acf->journey_customer_groupe;
    $query_personas = Persona::query_by_custumer_journey([$publication->wp->ID]);    
?>

<a href="<?php echo $publication->get_permalink(); ?>" class="m-custumer-journey-thumb b-radius-30 c-theme c-theme--<?php echo $custumer_group->acf->tax_theme?>">

    <h3 class="headline headline-md"><?php echo $publication->wp->post_title; ?></h3>
    <?php if ($query_personas->have_posts()): ?>

        <ul>
            <?php foreach ($query_personas->crocus as $index => $persona): ?>
                <li class="body body-md"><?php
                    $persona->show_metas('persona_specialty'); if ($index < $query_personas->found_posts() - 1) echo ' •'
                ?></li>
            <?php endforeach; ?>
        </ul>
        <ul class="m-custumer-journey-thumb-personas">
            <?php foreach ($query_personas->crocus as $index => $persona): ?>
                <li>
                    <div class="m-custumer-journey-thumb-persona-avatar">
                        <img src="<?php echo $persona->get_photo_url('avatar'); ?>" alt="">
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php else: ?>
    
    <?php
        $specialties = $publication->acf->persona_specialty;
        if ($specialties): ?>
            <ul>
                <?php foreach ($specialties as $index => $specialty): ?>
                    <li><?php echo $specialty->wp->name; if ($index < count($specialties) - 1) echo ' •'; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif;
    ?>

    <?php endif; ?>

</a>