<section class="o-hero-case-studies js-hero b-radius-36 <?php echo $class_css ?>" style="background-image: url('<?php echo $page->get_page_patterns('grande', 'maximale') ?>');" >
    
    <?php View::show('molecules/m-navigation', []); ?>

    <div class="grid sm:grid-cols-24 gap-20">
        <div class="sm:col-span-20 o-hero__hero">

            <h1 class="headline headline-lg hero-title"><?php echo $page->wp->post_title ?></h1>
            <b>Lead by <?php echo $page->acf->case_studie_lead; ?></b><br>
              <?php if ($categories = $page->acf->case_studie_categorie): ?>
                <ul>
                  <?php foreach ($categories as $key => $cat): ?>
                    <li><?php echo $cat->wp->name; ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
              <?php echo $page->acf->case_studie_date; ?><br>
            </div>    

        </div>
    </div>

</section>