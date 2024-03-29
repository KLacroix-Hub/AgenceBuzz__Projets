<?php if($type == 'doc') : ?>

    <a class="a-persona-lien <?php echo $class_css ?>" href="<?php echo $document['url']; ?>" download>
        <span class="body body-lg a-persona-lien__pdf"><?php echo $label; ?></span>
        <img src="<?php echo Image::get_url_from_theme('icon-download.svg'); ?>" alt="download">
    </a>

<?php elseif($type == 'lien') : ?>

    <a class="a-persona-lien c-theme c-theme--blue-light <?php echo $class_css ?>" href="<?php echo $lien['url']; ?>" target="<?php echo $lien['target']; ?>">
      <span class="body body-lg a-persona-lien__lien"><?php echo $lien['title']; ?></span>
      <img src="<?php echo Image::get_url_from_theme('icon-link.svg'); ?>" alt="link">
    </a>

<?php endif; ?>

