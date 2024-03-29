<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/owl/owl.theme.default.min.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="main" class="no_overflow">

    <header class="main-header">
        <div class="logo">
            <a id="home" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="<?php bloginfo('name'); ?>" />
            </a>
        </div>
        <span class="main-header__burger" id="burger-menu"></span>
        <div class="menu" id="menu-mobile">
            <nav class="menu-nav">
                <!-- shortcode  -->
                <?php echo do_shortcode('[language-switcher]'); ?>
                <a id="nos-marques" href="<?php echo esc_url(home_url('/nos-marques'));?>" class="headline headline-md menu-nav__link">Nos marques</a>
                <a id="a-propos" href="<?php echo esc_url(home_url('/a-propos'));?>" class="headline headline-md menu-nav__link">A propos</a>
                <a id="contact" href="<?php echo esc_url(home_url('/contact'));?>" class="headline headline-md menu-nav__link">Contact</a>
            </nav>
        </div>
        <div class="transition">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="<?php bloginfo('name'); ?>" />
            <div class="transition-loading body body-l">
                <span class="transition-loading__progress"></span>
            </div>
        </div>
    </header>