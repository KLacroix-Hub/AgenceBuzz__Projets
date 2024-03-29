<section class="o-home-cases-studies c-theme c-theme--blue <?php echo $class_css ?>">

    <div class="grid sm:grid-cols-24 gap-20">
        <div class="sm:col-span-2"></div>
        <div class="sm:col-span-4">
            <h2 class="hedline headline-md">
                Our community <br>successes
            </h2>

            <ul class="cta-see-list body body-lg">
            <?php
            $cats = $page->acf->home_cases_hightlight;
            $page = $page->acf->home_cases_page;
            $filters = [];
            if ($cats):
                foreach ($cats as $cat): $filters[] = $cat->wp->slug; ?>
                    <li>
                        <a class="" href="<?php echo $page->get_permalink() ?>?cat=<?php echo $cat->wp->slug ?>">
                            <?php echo $cat->wp->name; ?>
                        </a>
                    </li>
                <?php endforeach;
            endif;
            ?>
            </ul>

            <?php
                View::show('atomes/a-boutton', [
                    'class_css' => 'a-boutton--outline a-boutton--blue-dark',
                    'lien' => View::new_link('See all', $page->get_permalink())
                ]);
            ?>

        </div>
        <div class="sm:col-span-1"></div>
        <div class="sm:col-span-15">
            <?php if(!isset($ignore)) $ignore = []; ?>
            <?php $query = Case_Studie::query_by_cat($filters, 3, $ignore); ?>
            <?php if($query->have_posts()): ?>
                <div class="grid sm:grid-cols-3 gap-20">
                    <?php foreach ($query->crocus as $case_studie) :
                        $case_studie->show_view_thumb();
                    endforeach ?>
                </div>
            <?php endif ?>
        </div>
    </div>

</section>