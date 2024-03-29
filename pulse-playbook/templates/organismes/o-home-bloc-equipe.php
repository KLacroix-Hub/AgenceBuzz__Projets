<section class="o-home-bloc-equipe c-theme c-theme--blue <?php echo $class_css ?>">

    <div class="grid sm:grid-cols-24 gap-20">
        <div class="sm:col-span-3"></div>
        <div class="sm:col-span-4 o-home-bloc-equipe__container">
            <h2 class="headline headline-md"><?php echo $page->acf->home_who_titre ?></h2>
            <div class="body body-lg o-home-bloc-equipe__description">
                <?php echo Helper::the_content($page->acf->home_who); ?>
            </div>

            <?php 
                $option = Options::get_instance();
                $lien_yammer = $option->acf->lien_yammer;
                $lien_yammer['title'] = $page->acf->home_who_yammer_label;

                View::show('atomes/a-boutton', [
                    'class_css' => 'a-boutton--blue-light a-boutton--yammer',
                    'icon' => ['position' => 'right', 'svg' => Image::get_svg('icon-join-us', false)],
                    'lien' => $lien_yammer
                ]);
            ?>
        </div>
        <div class="sm:col-span-16">
            <div class="o-home-bloc-equipe-list">
                <?php $collaborateurs = $page->acf->home_collaborateurs; ?>
                <?php foreach ($collaborateurs as $key => $_collaborateur):
                    $collaborateur = $_collaborateur['collaborateur']; ?>

                    <div class="c-theme c-theme--<?php echo $_collaborateur['color']; ?> o-home-bloc-equipe-list__container">

                        <div class="o-home-bloc-equipe-list__figure">
                            <?php $photo = $collaborateur->acf->collaborateur_photo; ?>
                            <img src="<?php echo Image::get_url($photo,'petite'); ?>" alt="">
                        </div>

                        <?php $nom = $collaborateur->acf->collaborateur_nom; ?>
                        <?php $prenom = $collaborateur->acf->collaborateur_prenom; ?>
                        <h6 class="body boyd-lg"><?php echo $nom; ?>.<?php echo $prenom; ?></h6>
                        <div class="body body-sm">@saint-gobain.com</div>
                        
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
</section>