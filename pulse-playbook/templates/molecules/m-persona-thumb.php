<?php $custumer_group = $publication->acf->persona_custumer_group; ?>
<a href="<?php echo $publication->get_permalink(); ?>" class="m-persona-thumb b-radius-10 c-theme c-theme--<?php echo $custumer_group->acf->tax_theme ?> <?php echo $class_css ?>">

    <div class="m-persona-thumb-avatar">
        <img src="<?php echo $publication->get_photo_url(); ?>" alt="">
    </div>

    <div class="m-persona-thumb__content">
       <div class="m-persona-thumb__content-txt">
        <h3 class="body body-tab"><?php if ($specialty = $publication->acf->persona_specialty):
                if (is_array($specialty)) {
                    $specialty = $specialty[0];
                } ?>
                    <?php echo $specialty->wp->name; ?>
                <?php endif; ?>
            <h3>
            
            <h4 class="body body-md"><?php echo $custumer_group->wp->name; ?></h4>
            <h5 class="body body-md"><?php echo $publication->wp->post_title; ?></h5>
       </div>
       <svg xmlns="http://www.w3.org/2000/svg" width="28" height="36" viewBox="0 0 28 36" fill="none">
            <circle cx="14" cy="19" r="12.5" stroke-width="3"/>
            <path d="M21.7071 19.7071C22.0976 19.3166 22.0976 18.6834 21.7071 18.2929L15.3431 11.9289C14.9526 11.5384 14.3195 11.5384 13.9289 11.9289C13.5384 12.3195 13.5384 12.9526 13.9289 13.3431L19.5858 19L13.9289 24.6569C13.5384 25.0474 13.5384 25.6805 13.9289 26.0711C14.3195 26.4616 14.9526 26.4616 15.3431 26.0711L21.7071 19.7071ZM7 20L21 20L21 18L7 18L7 20Z"/>
        </svg>
    </div>

</a>

   
