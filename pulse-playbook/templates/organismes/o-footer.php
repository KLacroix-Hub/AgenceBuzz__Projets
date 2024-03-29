
<?php 
    $page = Page::get_global();
    if($page->acf->show_services) :
        View::show('organismes/o-services-sg', ['page' => $page]);
    endif;
 ?>

<footer class="o-footer c-theme c-theme--orange">

    <img src="<?php echo Image::get_url_from_theme('logo-pulse-couleur.png') ?>" alt="Logo pulse">

    <?php
        $option = Options::get_instance();
        View::show('atomes/a-boutton', [
            'class_css' => 'a-boutton--orange',
            'lien' => View::new_link('Contact us', 'mailto:' . $option->acf->option_contact)
        ]);
    ?>

</footer>


