<?php if($flex_blocs = $page->acf->page_flex_blocs) : ?>
    <section class="o-flexs <?php echo $class_css ?>">
        <?php 
            if(!isset($variation)) $variation = 'big';
            if($flex_blocs) :
                foreach ($flex_blocs as $bloc) :
                    View::show('molecules/m-flex-' . $bloc['acf_fc_layout'], ['bloc' => $bloc, 'variation' => $variation]);
                endforeach;
            endif;
        ?>
    </section>
<?php endif ?>