<section class="o-services-sg c-theme c-theme--blue-dark <?php echo $class_css ?>">

    <div class="grid sm:grid-cols-24 gap-10">
        <div class="sm:col-span-5">
            <h2 class="headline headline-md"><?php echo $page->acf->page_service_titre ?></h2>
            <p class="body body-lg"><?php echo $page->acf->page_service_description ?></p>
        </div>
        <?php if($services = $page->acf->page_services) : ?>
            <?php foreach ($services as $key => $service) : ?>
                <div class="sm:col-span-3 o-services-sg__list">
                    <?php $service->show_view_thumb(); ?>
                </div>
            <?php endforeach ?>
        <?php endif ?>

       </div>
</section>