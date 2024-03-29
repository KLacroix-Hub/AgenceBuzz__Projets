<?php if(!isset($type)) $type = 'standard'; ?>
<a class="m-cases-studies-thumb m-cases-studies-thumb--<?php echo $type; ?> <?php echo $class_css ?>" href="<?php echo $publication->get_permalink(); ?>">
    <article>
        <div class="m-cases-studies-thumb__figure">
            <?php $img = $publication->acf->case_studie_thumb; ?>
            <img src="<?php echo Image::get_url($img,'petite'); ?>" alt="<?php echo Image::get_alt($img); ?>"
            class=""
            >
        </div>
        <div>
            <h3 class="headline headline-filter m-cases-studies-thumb__title">
                <?php echo $publication->wp->post_title; ?>
            </h3>
            <div class="body body-lg m-cases-studies-thumb__date">
                <?php echo $publication->acf->case_studie_date; ?> • Lead by <?php echo $publication->acf->case_studie_lead; ?>
            </div>
        </div>
    </article>

</a>