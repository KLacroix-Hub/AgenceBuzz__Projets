<div class="m-flex-image  <?php echo $class_css; ?>">
  <div class="grid sm:grid-cols-<?php echo ($variation == 'big') ? '18' : '16' ?>">
    <?php $image = $bloc['image']; ?>
    <div class="sm:col-span-full">
        <img class="b-radius-50 image" src="<?php echo Image::get_url($image, 'grande'); ?>" alt="<?php echo Image::get_alt($image); ?>">
      

    </div>
  </div>
  <?php if($bloc['has_download']) :

        $document = $bloc['fichier'];
        $the_file = get_attached_file($document['ID']);
        $filesize = Helper::human_filesize(filesize($the_file));

        View::show('atomes/a-boutton', [
            'class_css' => 'm-flex-image-download a-boutton--outline',
            'lien' => View::new_link('Download <small>('.$filesize.')</small>', $bloc['fichier']['url']),
            'attribute' => 'download',
        ]);

  endif; ?>

</div>