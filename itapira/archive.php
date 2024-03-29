<?php get_header(); ?>

<main class="main-content">
    <div class="main-content__catchphrase">
        <h1 class="headline headline-xl catchphrase">
            <?php the_field('catchphrase_homepage'); ?>
        </h1>
    </div>
    <div class="main-content__figure">
    <div class="owl-carousel">
    <?php 
        $images = get_field('carousel_homepage');
        $size = 'full';
        if( $images ): ?>
                <?php foreach( $images as $image_id ): ?>
                    <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                <?php endforeach; ?>
        <?php endif; ?>
    </div>
    </div>

</main>

<?php get_footer(); ?>