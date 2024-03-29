<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/assets/img/favicon.png" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/owl/owl.theme.default.min.css">
    <title><?php echo the_title();?> - Portfolio 2023</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php $projets = get_posts(array(
    'post_type' => 'projets',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
    )); ?>

<div id="main" class="no_overflow
<?php
    
    if ( is_front_page() ) :
        echo 'main--home';
    else :
        echo "main";
    endif;

    ?>
">

    <header class="main-header">
    <h1 class="headline headline-xl 
    <?php
    
    if ( is_front_page() ) :
        echo 'title';
    else :
        echo "title--not-home";
    endif;

    ?>
    
    "> <?php echo the_title();?></h1>
    <nav class="main-header__nav">
        <?php if(!is_front_page()){?>
            <div class="link-container">
                <a href="<?php echo home_url();?>" class="main-header__nav__home-redirect body body-xl">Camille Plunian</a>
                </div>
       <?php  } ?>
        <div class="link-container">
            <a href="<?php echo home_url();?>" class="main-header__nav__projects body body-xl" >Projets <span class="body body-highlight">(<?php echo wp_count_posts('projets')->publish; ?>)</span></p>
        </div>
        
        <div class="link-container">
            <a class="main-header__nav__about body body-xl" href="<?php echo home_url("a-propos");?>">A propos</a>
        </div>
    </nav>
    </header>