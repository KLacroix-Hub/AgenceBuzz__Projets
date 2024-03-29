<div class="m-flex-carrousel <?php echo $class_css; ?>">
  <?php $images = $bloc['images']; ?>

  <div class="splide js-flex-carrousel">
    <div class="splide__track">
      <div class="splide__list">
        <?php foreach ($images as $image): ?> 
          <div class="splide__slide">
            <div class="image">
              <img src="<?php echo Image::get_url($image,'grande'); ?>" alt="<?php echo Image::get_alt($image); ?>">
          </div>
          
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</div>