<?php if ($drivers = $persona->acf->$field) : ?>
    <div class="a-persona-list <?php echo $class_css ?>">

        <h2 class="bloc-title headline headline-persona">
            <img src="<?php echo Image::get_url_from_theme($icon) ?>">
            <?php echo $title; ?>
        </h2>
        <ul class="drivers-list">
            <?php foreach ($drivers as $driver) : ?>
            <li class="drivers-item"><?php echo $driver['personas_drivers_value'] ?></li>
            <?php endforeach ?>
        </ul>
            
    </div>
<?php endif ?>