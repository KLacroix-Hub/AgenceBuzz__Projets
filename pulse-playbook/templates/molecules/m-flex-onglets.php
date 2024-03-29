<div class="m-flex-onglets g-margin-bottom <?php echo $class_css; ?>">
  <?php View::show('atomes/a-flex-titre', ['bloc' => $bloc]); ?>
  <div class="onglets">
    <div class="active js-no-animate"></div>
    <?php foreach ($bloc['onglets'] as $key => $onglet): ?>
      <button data-contenu="contenu-<?php echo $key; ?>" class="button js-change-tab js-no-animate">
          <?php echo $onglet['titre']; ?></button>
    <?php endforeach; ?>
  </div>
      
  <div class="onglets-contenu">
    <?php foreach ($bloc['onglets'] as $key => $onglet): ?>
      <div id="contenu-<?php echo $key; ?>" class="contenu js-contenu">
        <?php View::show('atomes/a-the-content', [
            'contenu' => $onglet['contenu'],
        ]); ?>
      </div>
    <?php endforeach; ?>
  </div>

</div>