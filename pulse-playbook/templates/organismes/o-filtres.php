<section class="o-filtres <?php echo $class_css ?>" data-type="<?php echo $type ?>">

    <h2 class="headline headline-md">Choose your target</h2>

    <?php
        
        $hidden = 'g-hidden';
        foreach ($taxos as $key => $taxo) :
            if(isset($taxo['selected']) && $taxo['selected']){
                $hidden = '';
                break;
            }
        endforeach;

        View::show('atomes/a-boutton', [
            'class_css' => 'js-reset-filtres o-filtres-reset headline headline-xs ' . $hidden,
            'lien' => View::new_link('Reset all filters', '#')
        ]);

    ?>
    
    <?php foreach ($taxos as $key => $taxo) : ?>
        <?php $terms = $taxo['class']::get_terms(); ?>
        <div class="js-filtres o-filtres-bloc <?php echo ($key == 0) ? 'open' : 'close' ?>" data-taxo="<?php echo $taxo['class']::TAXONOMY ?>">
            <h3 class="headline headline-filter js-filtres-title o-filtres-bloc-title"><?php echo $taxo['titre'] ?> <img class="" src="<?php echo Image::get_url_from_theme('icon-down.svg') ?>" alt=""></h3>
            <ul class="o-filtres-bloc-content">
                <li class="selector selector-all">
                    <label>
                        <input class="js-filtre js-filtre-all" type="checkbox" autocomplete="off" checked="true" name="all" id=""> 
                        All
                    </label></li>
                <?php 
                    if($terms): 
                        foreach ($terms as $term) : ?>
                            <li class="selector c-theme c-theme--<?php echo $term->acf->tax_theme; ?>">
                                <label>
                                    <input <?php if(isset($taxo['selected']) && $taxo['selected'] ==  $term->wp->slug) echo 'checked'; ?> 
                                    class="js-filtre" type="checkbox" autocomplete="off" data-type="<?php echo $term->wp->taxonomy ?>" class="js-filter" 
                                    value="<?php echo $term->wp->term_id; ?>" name="<?php echo $term->wp->taxonomy ?>[]" id="">
                                    <?php echo $term->wp->name; ?>
                                </label>
                            </li>
                        <?php endforeach ?>
                    <?php endif;    
                ?>
            </ul>
        </div>
    <?php endforeach ?>

</section>