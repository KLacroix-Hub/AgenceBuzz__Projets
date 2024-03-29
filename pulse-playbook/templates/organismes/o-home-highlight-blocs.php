<section class="o-home-highlight-blocs <?php echo $class_css ?>">

    <div class="grid sm:grid-cols-24 gap-20">
        <div class="sm:col-span-1"></div>
        <div class="sm:col-span-22">
            <div class="grid sm:grid-cols-3 gap-20">
                <?php 
                    $blocs = $page->acf->home_highlight_blocs;
                    foreach ($blocs as $key => $bloc) : ?>

                        <?php if($key == 2) : ?>
                            <div class="column-double">
                        <?php endif ?>

                        <?php $page = $bloc['page']; ?>
                        <article style="background-image: url('<?php echo $page->get_page_patterns('petite', 'moyenne') ?>');"  
                        class="c-theme c-theme--theming-content  c-theme--<?php echo $page->acf->page_theme ?>">
                            
                            <div class="bloc-header">
                                <h3 class="headline headline-md"><?php echo $bloc['titre'] ?></h3>
                                <p class="body body-md"><?php echo $bloc['description'] ?></p>
                            </div>
                            
                            <?php if($bloc['show_children']) : ?>
                                <?php $query = $page->query_child(); ?>
                                <?php if($query->have_posts()) : ?>
                                <ul>
                                <?php if($bloc['children_has_titre']): ?>
                                    <h4 class="body body-xl"><?php echo $bloc['children_titre'] ?></h4>
                                <?php endif ?>
                                    <?php foreach ($query->crocus as $child) : ?>
                                        <li>
                                            <a class="c-theme--theming-text body body-lg" href="<?php echo $child->get_permalink() ?>"><?php echo $child->wp->post_title ?></a>
                                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path id="Arrow 3" d="M1 3.5C0.723858 3.5 0.5 3.72386 0.5 4C0.5 4.27614 0.723858 4.5 1 4.5L1 3.5ZM13.3536 4.35355C13.5488 4.15829 13.5488 3.84171 13.3536 3.64645L10.1716 0.464467C9.97631 0.269205 9.65973 0.269205 9.46447 0.464467C9.2692 0.659729 9.2692 0.976311 9.46447 1.17157L12.2929 4L9.46447 6.82843C9.2692 7.02369 9.2692 7.34027 9.46447 7.53553C9.65973 7.7308 9.97631 7.7308 10.1716 7.53553L13.3536 4.35355ZM1 4.5L13 4.5L13 3.5L1 3.5L1 4.5Z" fill="#0587C4"/>
                                            </svg>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                                <?php endif ?>
                            <?php endif ?>

                            <?php if($bloc['show_lien']): 
                                View::show('atomes/a-boutton', [
                                    'class_css' => 'a-boutton--outline',
                                    'lien' => View::new_link($bloc['libelle'], $page->get_permalink())
                                ]);
                            endif ?>

                        </article>
                        
                        <?php if($key == 3) : ?>
                            </div>
                        <?php endif ?>

                    <?php endforeach;
                ?>
            </div>
        </div>
    </div>


</section>