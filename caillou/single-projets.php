<?php get_header(); ?>

<section class="main-project">
    <div class="main-project__infos">
        <div class="project-infos">              
            <p class="project-infos__year body body-highlight"><?php echo get_field("project_year") ?></p>
            <p class="project-infos__category body body-highlight"><?php echo get_field("project_type") ?></p>
        </div>
        <?php
        while (have_posts()): ?>
        <div class="project-presentation body body-highlight"><?php the_content(); ?></div>
            <?php the_post();
        endwhile;?>
    </div>
    <div class="main-project__images">
        <?php if(have_rows("project_images")) :
            
            while(have_rows("project_images")): the_row();?>
            
                <?php if(get_row_layout()=='project_img_100'):?>
                    <div class="main-project__images__col-one">
                        <img src='<?php echo the_sub_field("projet_img_fullscreen");?>' />
                    </div>
                    
                <?php elseif(get_row_layout()=="project_image_50"): ?>

                    <div class="main-project__images__col-two">

                        <?php if(have_rows("project_image_50_repetor")): ?>

                            <?php while(have_rows("project_image_50_repetor")): 
                                the_row();?>
                                <img src="<?php echo the_sub_field('img_1');?>" />
                                <img src="<?php echo the_sub_field('img_2'); ?>" />

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>

                <?php elseif(get_row_layout()=="project_video_100"):?>
                   <div class="main-project__images__col-one">
                        <video controls playsinline>
                            <source src="<?php echo the_sub_field("video_fullscreen")?>" type="video/mp4">
                        </video>
                   </div>

                <?php elseif(get_row_layout()=="project_video_100_no_player"):?>
                    <div class="main-project__images__col-one">
                            <video autoplay loop muted playsinline>
                                <source src="<?php echo the_sub_field("video_fullscreen")?>" type="video/mp4">
                            </video>
                    </div>

                   <?php elseif(get_row_layout()=="project_video_image_50"): ?>

                        <div class="main-project__images__col-two">

                            <?php if(have_rows("project_video_image_50_repetor")): ?>

                                <?php while(have_rows("project_video_image_50_repetor")): 
                                    the_row();
                                    ?>
                                    
                                    <video autoplay loop muted playsinline>
                                        <source src="<?php echo the_sub_field("video_gauche")?>" type="video/mp4">
                                    </video>
                                    <img src="<?php echo the_sub_field('img_droite'); ?>" />

                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>

                    <?php elseif(get_row_layout()=="project_image_video_50"): ?>

                        <div class="main-project__images__col-two">

                            <?php if(have_rows("project_image_50_repetor")): ?>

                                <?php while(have_rows("project_image_50_repetor")): 
                                    the_row();?>
                                    <img src="<?php echo the_sub_field('img_1'); ?>" />
                                    <video autoplay loop muted playsinline>
                                        <source src="<?php echo the_sub_field("video")?>" type="video/mp4">
                                    </video>

                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>

                        <?php elseif(get_row_layout()=="project_videos_50"): ?>

                            <div class="main-project__images__col-two">

                                <?php if(have_rows("project_image_50_repetor")): ?>

                                    <?php while(have_rows("project_image_50_repetor")): 
                                        the_row();?>
                                       
                                        <video autoplay loop muted playsinline>
                                            <source src="<?php echo the_sub_field("video_1")?>" type="video/mp4">
                                        </video>
                                        <video autoplay loop muted playsinline>
                                            <source src="<?php echo the_sub_field("video_2")?>" type="video/mp4">
                                        </video>

                                    <?php endwhile; ?>
                                <?php endif; ?>

                            </div>

                <?php endif; ?>
        
            <?php endwhile;
        endif; ?>
    </div>
    <div class="main-project__credits">
        
        <?php if(have_rows("project_credit")):?>
            <?php while(have_rows("project_credit")): the_row();?>
            <div class='row'>
                <p class="row-what body body-highlight"><?php echo the_sub_field("project_credit_metier") ?><p>
                <p class="row-who body body-highlight"><?php echo the_sub_field("project_credit_name") ?><p>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>