
<?php $cats = $publication->acf->toolbox_categorie; ?>
<div class="m-toolkit-thumb b-radius-36 c-theme c-theme--<?php echo $cats[0]->acf->tax_theme; ?> <?php echo $class_css ?>">

    <div class="grid sm:grid-cols-16 gap-36">
        <div class="sm:col-span-8">
            <?php $thumbnail = $publication->acf->toolbox_thumbnail; ?>
            <div class="m-toolkit-thumb__thumb">
                <img src="<?php echo Image::get_url($thumbnail, 'moyenne') ?>" alt="">
            </div>
        </div>

        <div class="sm:col-span-8">
            <div class="m-toolkit-thumb__content">
                <h3 class="headline headline-md c-theme--theming-text"><?php echo $publication->wp->post_title ?></h3>
                <p class="body body-sm c-theme--theming-text"><?php echo $publication->acf->toolbox_description; ?></p>
                <?php
                    $document = $publication->acf->toolbox_document;
                    $the_file = get_attached_file($document['ID']);
                    $lien_titre = 'Download (' . Helper::human_filesize(filesize($the_file)) . ")";

                    View::show('atomes/a-boutton', [
                        'lien' => View::new_link($lien_titre, $document['url']),
                        'icon' => ['position' => 'left', 'svg' => Image::get_svg('picto-download-blanc'), 'alt' => 'Link'],
                    ]);
                ?>
            </div>
        </div>
    </div>

</div>