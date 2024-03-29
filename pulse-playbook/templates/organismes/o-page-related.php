<?php if($page->acf->show_publications && $pages = $page->acf->page_related) : ?>
    <section class="o-page-related <?php echo $class_css ?>">
        <div class="grid sm:grid-cols-24">
            <div class="sm:col-span-1"></div>
            <div class="sm:col-span-22">
                <div class="grid sm:grid-cols-22">
                    <div class="sm:col-span-22">
                        <h2><?php echo $page->acf->page_related_titre ?></h2>
                    </div>
                    <div class="sm:col-span-1"></div>
                    <div class="sm:col-span-20">
                        <div class="grid sm:grid-cols-<?php echo count($pages) ?> gap-20 o-page-related__articles">
                            <?php foreach ($pages as $related) :
                                $publication = $related['publication'];
                                $label = $related['label'];
                                $publication->show_view_thumb(['label' => $label]);
                            endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>