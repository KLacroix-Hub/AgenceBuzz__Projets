<?php $background = $page->acf->home_background_image; ?>
<?php $logo_pulse = $page->acf->home_logo_pulse ?>

<section class="o-home-hero js-hero <?php echo $class_css ?>" style="background-image: url('<?php echo Image::get_url($background, 'maximale') ?>');" >

    <?php View::show('molecules/m-navigation', []); ?>
    
    <?php 
        if($nouvelle = Nouvelle::get_last()) : 
            View::show('molecules/m-nouvelle-pop', [
                'nouvelle' => $nouvelle
            ]);    
        endif;
    ?>

    <div class="grid sm:grid-cols-24 gap-20">
        <div class="sm:col-span-13 hero">
            <h1 class="headline headline-lg hero-title"><?php echo $page->acf->home_titre ?></h1>
        </div>
        <div class="sm:col-span-2"></div>
        <div class="sm:col-span-5 o-home-hero-logo">
            <img src="<?php echo Image::get_url($logo_pulse, 'moyenne') ?>" alt="Logo Pulse">
        </div>
    </div>

</section>