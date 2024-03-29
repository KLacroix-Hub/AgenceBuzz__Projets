<?php if ($content = $persona->acf->$field) : ?>
<div class="a-persona-content <?php echo $class_css ?>">
    <h2 class="headline headline-persona">
        <img src="<?php echo Image::get_url_from_theme($icon); ?>">
        <?php echo $title ?>
    </h2>
    <?php echo Helper::the_content($content); ?>  
</div>
<?php endif ?>