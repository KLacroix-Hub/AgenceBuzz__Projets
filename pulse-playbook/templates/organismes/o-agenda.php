<section class="o-agenda <?php echo $class_css ?>" id="agenda">

    <div class="grid sm:grid-cols-24 gap-20">
        <div class="sm:col-span-2"></div>
        <div class="o-agenda__filter sm:col-span-4 c-theme c-theme--blue">
            <?php /** Filtres **/ ?>

            <h2 class="headline headline-md"><?php echo $page->acf->home_agenda_titre ?></h2>
            <h3 class="headline headline-filter"><?php echo $page->acf->home_agenda_soustitre ?></h3>

            <?php $types_evenement = Type_evenement::get_terms(); ?>
            <?php if($types_evenement) : ?>
                <ul class="body body-lg">
                    <li>
                        <a class="active js-filtre-item" data-type="all" href="#all">
                            <span class="js-filtre-item__select"></span>
                            To come
                        </a>
                    </li>
                    <?php foreach ($types_evenement as $key => $term) : ?>
                        <li>
                            <a class="js-filtre-item" data-type="<?php echo $term->wp->slug ?>" href="#<?php echo $term->wp->slug ?>">
                                <span class="js-filtre-item__select"></span>
                                <?php echo $term->wp->name ?>
                            </a>
                            <span class="c-theme c-theme--<?php echo $term->acf->tax_theme ?> c-theme--theming-text">
                                &#x2022;
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif ?>
        </div>
        <div class="sm:col-span-1"></div>
        <div class="sm:col-span-15 o-agenda__thumbnails">   
            <?php /** Évènement **/ ?>
            <?php $query_incoming = Agenda::query_incoming(); ?>
            <?php if($query_incoming->have_posts()) : ?>
                <div class="js-evenements grid sm:grid-cols-6 gap-20">
                    <?php foreach ($query_incoming->crocus as $evenement) :
                        $evenement->show_view_thumb();
                    endforeach; ?>
                </div>
            <?php else : ?>
                <p>There is no event yet</p>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="grid sm:grid-cols-24 gap-20">
        <div class="sm:col-span-2"></div>
        <div class="sm:col-span-20 ">  
            <?php /** Mise en avant **/ ?>
            <?php $hightlight = $page->acf->home_hightlight;?>
            <?php if($hightlight): ?>
                <div class="c-theme c-theme--vert o-agenda__replays">
                    <h4 class="headline headline-filter"><?php echo $hightlight['titre'] ?></h4>
                    <?php
                        View::show('atomes/a-boutton', [
                            'class_css' => 'headline headline-xs c-theme c-theme--vert o-agenda__replays-more',
                            'lien' => $hightlight['lien']
                        ]); 
                    ?>
                </div>
            <?php endif ?>
        </div>
        <div class="sm:col-span-2"></div>
    </div>

    

</section>