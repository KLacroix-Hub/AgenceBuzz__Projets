<?php 
  $has_icon = isset($icon);
  if(!isset($attribute)) $attribute = '';
?>
<a href="<?php echo $lien['url']; ?>" <?php echo $attribute ?> 
class="a-boutton target<?php echo $lien['target']; ?><?php echo $has_icon ? 'has-icon icon-position-' . $icon['position'] : '' ?> <?php echo $class_css; ?>"
target="<?php echo $lien['target']; ?>"
>

  <?php if($has_icon && $icon['position'] == 'left') : echo $icon['svg']; endif ?>

  <?php if ($lien['target'] == '_blank'): ?>
    <span class="blank-icon"></span>
  <?php endif; ?>
  
  <?php if($has_icon && $icon['position'] == 'full') : ?>
    <img src="<?php echo $icon['path'] ?>" alt="<?php echo $icon['alt'] ?>">
  <?php else : ?>
    <span><?php echo $lien['title']; ?></span>
  <?php endif ?>

  <?php if($has_icon && $icon['position'] == 'right') : echo $icon['svg']; endif ?>

</a>