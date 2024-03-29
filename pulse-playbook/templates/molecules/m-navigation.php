<nav class="m-navigation <?php echo $class_css ?>">
    
    <?php $option = Options::get_instance(); ?>
    <?php 
        $menu_principal = $option->acf->menu_principal;
        $menu_secondaire = $option->acf->menu_secondaire;
        $bouton_join_us = $option->acf->bouton_join_us;
    ?>

    <div class="grid sm:grid-cols-24">
        <div class="sm:col-span-20 m-navigation__container">
            <a href="<?php echo home_url() ?>">
                <img class="logo" src="<?php echo Image::get_url_from_theme('logo-st-gobain.svg') ?>" alt="Logo pulse">
                <img class="logo-two" src="<?php echo Image::get_url_from_theme('logo-two.svg') ?>" alt="Logo pulse">
            </a>
        <span>
            <img class="burger-menu" src="<?php echo Image::get_url_from_theme('burger.svg') ?>" />
            <img class="burger-menu-two " src="<?php echo Image::get_url_from_theme('burger-two.svg') ?>" />
        </span>
        
           <div class="menu-container">
            <img class="menu-container__close burger-menu-close" src="<?php echo Image::get_url_from_theme('burger-menu-close.svg') ?>"  />
           <div class="menu-principal">
                <?php foreach ($menu_principal as $item) : $lien = $item['lien'] ?>
                    <a class="menu-principal__item" href="<?php echo $lien['url'] ?>" target="<?php echo $lien['target'] ?>"><?php echo $lien['title'] ?></a>
                <?php endforeach ?>
            </div>
            <div class="menu-secondaire">
                <?php $themes = ['white', 'extraordinary', 'orange-white']; ?>
                <?php $styles = ['a-boutton--outline a-boutton-menu', 'a-boutton-menu', 'a-boutton-menu']; ?>
                <?php foreach ($menu_secondaire as $key => $item) :
                    View::show('atomes/a-boutton', [
                        'class_css' => $styles[$key] . ' a-boutton--' . $themes[$key],
                        'lien' => $item['lien']
                    ]);
                endforeach ?>
            </div>
           </div>
        </div>
    </div>




</nav>

