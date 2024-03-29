<section class="m-nouvelle-pop c-theme c-theme--orange <?php echo $class_css ?>">

    <div class="body body-lg m-nouvelle-pop__title" >What’s hot?</div>
    <?php 
        $mot_cle; $lien; 
        if($nouvelle->acf->has_evenement) :
            $mot_cle = $nouvelle->acf->agenda_type;
            $lien = '#agenda';
            $btn = View::get('atomes/a-boutton', [
                'class_css' => 'a-boutton--outline a-boutton--small',
                'icon' => ['position' => 'right', 'svg' => Image::get_svg('icon-scroll')],
                'lien' => View::new_link('See more', $lien)
            ]); 
        else : 
            $mot_cle = $nouvelle->acf->nouvelle_contenu['mot_cles'];
            $lien = $nouvelle->acf->nouvelle_contenu['lien']["url"];
            $btn = View::get('atomes/a-boutton', [
                'class_css' => 'a-boutton--outline a-boutton--small',
                'lien' => View::new_link('See more', $lien)
            ]); 
        endif;

    ?>

    <div class="m-nouvelle-pop__object">
        <div class="body body-sm"><?php echo $mot_cle ?></div>
        <h3 class="body body-md"><?php echo $nouvelle->wp->post_title ?></h3>
    </div>

  <div class="m-nouvelle-pop__more">
        <?php echo $btn ?>
    
    <?php // tu peux commenter la ligne 9 du fichier js/m-nouvelle-pop pour désactivé la mise en cookie ?>
    <button class="js-close-pop" data-modifiedtime="<?php echo $nouvelle->get_modified_time() ?>">
        <img src="<?php echo Image::get_url_from_theme('icon-close.svg') ?>" alt="Close">
    </button>
  </div>

</section>