<?php 

$tags;
if($bloc['type'] == 'section') : $tags = 'h2';
else: $tags = 'h3';
endif; ?>

<div class="m-flex-title m-flex-title--<?php echo $bloc['type'] ?> <?php echo $class_css ?>">
    
    <div class="grid sm:grid-cols-<?php echo ($variation == 'big') ? '18' : '16' ?>">
        <div class="sm:col-span-16 headline headline-section">
        <<?php echo $tags ?>><?php echo $bloc['titre'] ?></<?php echo $tags ?>>
        </div>
    </div>

</div>