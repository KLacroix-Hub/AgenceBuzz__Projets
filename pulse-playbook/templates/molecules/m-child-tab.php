<div class="m-child-tab b-radius-36 <?php echo $class_css ?>">

    <h3><?php echo $page->wp->post_title ?></h3>
    <?php
        /** Bloc flexs */
        View::show('organismes/o-flexs', ['page' => $page]);
    ?>

</div>