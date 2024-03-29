<?php get_header(); 
/* Template Name: TPL Brand */
?>

<section class="main-brands">
    
    <div class="main-brands__figure">
    <?php if( have_rows('marque') ): ?>
        <?php while( have_rows('marque') ): the_row(); 
            // vars
            // $brands_page_prez = get_sub_field('brands_page_prez');
            // $logo = get_sub_field('brands_page_logo');
            $name = get_sub_field('brands_page_name');
            $image_prez = get_sub_field('brands_page_showoff');
            ?>
                <img class="logo-marque <?php echo $name;?>" src="<?php echo $image_prez ?>" />
                <?php endwhile; ?>
                <?php endif; ?>
    </div>
        <div class="main-brands__informations">
            
    <div class="wrapper-name">
        <?php if( have_rows('marque') ): ?>
            <?php while( have_rows('marque') ): the_row(); 
                $logo = get_sub_field('brands_page_logo');
                $name = get_sub_field('brands_page_name');
            ?>
                <div class="wrapper-brand__name <?php echo $name;?>">
                    <img src="<?php echo $logo; ?>" />
                    <h3 class="body body-xl"><?php echo $name; ?></h3>
                </div>
                
                <?php endwhile;?>
                <?php endif; ?>
            </div>

        <div class="wrapper-paragraphe">
            <?php if( have_rows('marque') ): ?>
                <?php while( have_rows('marque') ): the_row(); 
                    $brands_page_prez = get_sub_field('brands_page_prez');
                    $name = get_sub_field('brands_page_name');
                ?>
                    <span class="headline headline-regular wrapper-paragraphe__content <?php echo $name;?> content-<?php echo $name;?>"><?php echo $brands_page_prez; ?></span> 
                <?php endwhile;?>
            <?php endif; ?>
        </div>
        </div>
</section>

<?php get_footer(); ?>