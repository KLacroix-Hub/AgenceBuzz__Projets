<section class="o-persona-community <?php echo $class_css ?>">

    <div class="grid sm:grid-cols-24 gap-20">

        <div class="sm:col-span-24">
            <?php View::show('molecules/m-persona-back', []); ?>
        </div>
        <div class="sm:col-span-16"></div>
        <div class="sm:col-span-7 body body-xl shared">
            <span>Persona shared by </span>
            <b><?php echo $persona->acf->persona_shared_by; ?></b>
        </div>
        <div class="sm:col-span-1"></div>
        <div class="sm:col-span-1"></div>
        <div class="sm:col-span-22">

            <?php
                View::show('molecules/m-relationship-map-pdf', [
                    'img' => $persona->acf->persona_pdf_image,
                    'pdf' => $persona->acf->persona_pdf,
                    'ppt' => false,
                    'title' => 'Persona',
                ]);
            ?>
            
        </div>
        
        <?php
            $location = $persona->acf->persona_location;
            $query = Persona::query_by_location($location->wp->slug, [$persona->wp->ID]);
        ?>

        <?php if($query->have_posts()) :  ?>
            <div class="sm:col-span-24">
                <div class="grid sm:grid-cols-24 gap-20 other-personas">
                    <div class="sm:col-span-1"></div>
                    <div class="sm:col-span-6">
                        <h2 class="headline headline-md">
                            Other <?php echo $location->wp->name; ?><br>
                            personas
                        </h2>
                    </div>
                    <div class="sm:col-span-16">
                        <?php $init_slider = ($query->post_count > 2); ?>
                        
                        <?php if($init_slider) : ?>
                            <div class="splide" id="o-persona-community_splide">
                                <div class="splide__track">
                                    <div class="splide__list">
                                        <?php foreach ($query->crocus as $persona): ?>
                                            <?php $persona->show_view_thumb(['class_css' => 'splide__slide']); ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                         <?php else : ?>
                            <div class="grid sm:grid-cols-2 gap-20">
                                <?php foreach ($query->crocus as $persona): ?>
                                    <?php $persona->show_view_thumb(); ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif ?>

                    </div>
                    <div class="sm:col-span-1"></div>
                </div>
            </div>
        <?php endif ?>

    </div>

</section>

