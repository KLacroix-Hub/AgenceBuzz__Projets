<?php

    $query = $page->query_sibling();
    $prev = false; $next = false;

    if($query && $query->have_posts()): 
        foreach ($query->crocus as $key => $sibling) :
            if($sibling->wp->ID == $page->wp->ID){
                if(isset($query->crocus[$key - 1])) $prev = $query->crocus[$key - 1];
                if(isset($query->crocus[$key + 1])) $next = $query->crocus[$key + 1];
            }
        endforeach;
    endif;

?>

<?php if($prev || $next) : ?>
    <section class="o-pagination-between-page <?php echo $class_css ?>">
        <div class="grid sm:grid-cols-24">
            <div class="sm:col-span-full">
                <h2>Continue to read :</h2>
                
            </div>
            <div class="sm:col-span-3"></div>
            <div class="sm:col-span-18">
                <div class="grid sm:grid-cols-2 gap-20">

                    <?php if($prev) : ?>
                        <?php View::show('molecules/m-child-page-thumb', [
                            'page' => $prev, 'label' => 'Previous topic', 'icon' => 'icon-arrow-left.svg'
                        ]); ?>
                    <?php else : ?>
                        <div></div>
                    <?php endif; ?>

                    <?php if($next) : ?>
                        <?php View::show('molecules/m-child-page-thumb', [
                            'page' => $next, 'label' => 'Next topic', 'icon' => 'icon-arrow-next.svg'
                        ]); ?>
                    <?php else : ?>
                        <div></div>
                    <?php endif; ?>

                    
                </div>
            </div>
        </div>
    </section>
<?php endif ?>