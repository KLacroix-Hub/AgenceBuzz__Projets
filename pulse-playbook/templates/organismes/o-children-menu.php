<section class="o-children-menu <?php echo $class_css ?>">

    <?php foreach ($query->crocus as $page) : ?>
        <a class="o-children-menu-item b-radius-10 body body-lg <?php echo $page->wp->ID == $active->wp->ID ? 'active' : '' ?>" 
            data-page=<?php echo $page->wp->ID ?>  
            href="<?php echo $page->get_permalink() ?>"><?php echo $page->wp->post_title ?>
          
        <?php if($page->wp->ID != $active->wp->ID): ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="36" viewBox="0 0 28 36" fill="none">
                <circle cx="14" cy="19" r="12.5" stroke-width="3"/>
                <path d="M21.7071 19.7071C22.0976 19.3166 22.0976 18.6834 21.7071 18.2929L15.3431 11.9289C14.9526 11.5384 14.3195 11.5384 13.9289 11.9289C13.5384 12.3195 13.5384 12.9526 13.9289 13.3431L19.5858 19L13.9289 24.6569C13.5384 25.0474 13.5384 25.6805 13.9289 26.0711C14.3195 26.4616 14.9526 26.4616 15.3431 26.0711L21.7071 19.7071ZM7 20L21 20L21 18L7 18L7 20Z" />
            </svg>
            <?php endif; ?>
            </a>  
    <?php endforeach; ?>

</section>