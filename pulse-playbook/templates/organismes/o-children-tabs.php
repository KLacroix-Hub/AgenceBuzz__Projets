<section class="o-children-tabs c-theme c-theme--theming-content c-theme--vert <?php echo $class_css ?>">

    <div class="">
		<div class="o-children-tabs__menu ">
            <?php foreach ($query->crocus as $page) : ?>
                <a class="js-select-tab b-radius-20 body body-tab <?php echo $page->wp->ID == $active->wp->ID ? 'active' : '' ?>" 
                    data-page=<?php echo $page->wp->ID ?>  
                    href="<?php echo $page->get_permalink() ?>"><?php echo $page->wp->post_title ?></a>    
            <?php endforeach; ?>
		</div>
	</div>

    <div class="">
		<div class="o-children-tab__content">
            <div class="js-child">
                <?php  View::show('molecules/m-child-tab', ['page' => $active]); ?>
            </div>
		</div>
	</div>

</section>