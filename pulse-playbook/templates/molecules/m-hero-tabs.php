<div class="m-hero-tabs c-theme c-theme--blue-dark <?php echo $class_css ?>">

    <?php if($query_sibling->have_posts()) : ?> 
            <?php foreach ($query_sibling->crocus as $page) : ?>
                <a class="<?php echo ($page->wp->ID == $current_page->wp->ID) ? 'active m-hero-tabs__item body body-highlight' : 'm-hero-tabs__item body body-highlight' ?>" href="<?php echo $page->get_permalink() ?>">
                    <?php echo $page->wp->post_title ?>
                </a>
            <?php endforeach ?>

    <?php endif; ?>

</div>