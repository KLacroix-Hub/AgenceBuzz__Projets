<section class="m-relationship-map-pdf c-theme c-theme--blue-dark <?php echo $class_css ?>">

    <?php if($img) : ?>
      <img class="map" src="<?php echo $img['url'] ?>" alt="">
    <?php endif; ?>

    <?php if($pdf || $ppt) : ?>
       <div class="download">

        <h2 class="download-title headline headline-md">Download Material</h2>
          <div class="download-material">
            <h3 class="material-title title body body-highlight"><?php echo $title ?></h3>
            <?php if($pdf) :?>
              <a href="<?php echo $pdf['url'] ?>" class="ui-btn body body-lg" download>PDF</a><?php endif; ?>
            <?php if($ppt) :?>
              <a href="<?php echo $ppt['url'] ?>" class="ui-btn body body-lg" download>PPT</a><?php endif; ?>
          </div>
       </div>
    <?php endif; ?>

</section>
