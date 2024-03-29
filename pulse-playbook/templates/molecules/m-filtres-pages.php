<div class="m-filtres-pages <?php echo $class_css ?> c-theme c-theme--blue-dark">

    <h2 class="headline headline-sm"><?php echo $page->acf->titre_questionnaire; ?></h2>
    <?php 
        $questionnaire = $page->acf->page_questionnaire;
    ?>
    <div class="splide js-flex-filtres">
        <div class="splide__track">
            <div class="splide__list">
                <div class="splide__slide">
                    <?php View::show('atomes/a-filtre-pages', [
                        'question' => $questionnaire['question'],
                        'reponses' => $questionnaire['reponses'],
                        'page' => $page
                    ]); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="m-filtres-pages-actions">

        <?php
            // View::show('atomes/a-boutton', [
            //     'class_css' => 'a-boutton--outline js-prev g-hidden',
            //     'lien' => View::new_link('Preview step', '#')
            // ]);
        ?>
        
        <div class="m-filtres-pages-actions__cta">
            <?php
            View::show('atomes/a-boutton', [
                'class_css' => 'a-boutton--outline js-all',
                'lien' => View::new_link('All insights', '#')
            ]);
            ?>

            <?php
            View::show('atomes/a-boutton', [
                'class_css' => 'a-boutton--outline js-clear g-hidden',
                'lien' => View::new_link('Clear all filters', '#'),
                'icon' => ['position' => 'left', 'svg' => Image::get_svg('icon-close')],
            ]);
            ?>

            <?php
            View::show('atomes/a-boutton', [
                'class_css' => 'a-boutton--orange js-action',
                'lien' => View::new_link('Next question', '#')
            ]);
            ?>

            <?php
            View::show('atomes/a-boutton', [
                'class_css' => 'a-boutton--orange js-anchor g-hidden',
                'lien' => View::new_link('Show result', '#result'),
                'icon' => ['position' => 'left', 'svg' => Image::get_svg('icon-anchor')],
            ]);
            ?>
        </div>

    </div>

</div>