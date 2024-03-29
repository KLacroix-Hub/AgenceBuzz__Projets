<section class="o-hero js-hero b-radius-36 <?php echo $class_css ?>" style="background-image: url('<?php echo $page->get_page_patterns('grande', 'maximale') ?>');" >
    
    <?php View::show('molecules/m-navigation', []); ?>

    <div class="grid sm:grid-cols-24 gap-20">
        <div class="sm:col-span-20 o-hero__hero">

            <?php if(isset($parent) && $parent) : ?>
                <a class="headline headline-filter" href="<?php echo $parent->get_permalink() ?>"><?php echo $parent->wp->post_title ?></a>
            <?php endif; ?>

            <h1 class="headline headline-lg hero-title"><?php echo $page->wp->post_title ?></h1>

            <?php if(isset($sub_view)) : 
                echo $sub_view;
            endif; ?>

        </div>
    </div>

</section>