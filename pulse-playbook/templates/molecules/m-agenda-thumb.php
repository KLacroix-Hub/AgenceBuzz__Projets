<?php 
    $is_past = $publication->is_past();
    $type = $publication->acf->agenda_type;
?>

<article class="m-agenda-thumb c-theme c-theme--<?php echo $type->acf->tax_theme; ?> <?php echo $class_css ?>">
        <?php 
            $date_debut = strtotime($publication->acf->agenda_date_start);
            $date_fin = strtotime($publication->acf->agenda_date_end);
        ?>
    
    <div class="m-agenda-thumb__cartouche">
        
        <div class="m-agenda-thumb__cartouche-start">
            <span class="body body-lg"><?php echo date_i18n('M', $date_debut); ?></span>
            <span class="headline headline-sm"><?php echo date_i18n('d', $date_debut); ?></span>
        </div>
        <div class="m-agenda-thumb__cartouche-end body body-lg">
            <?php if($date_debut == $date_fin) : ?>
                <?php echo date_i18n('Y', $date_debut); ?>
            <?php else : ?>
                to <b><?php echo date_i18n('d.m.Y', $date_fin); ?></b>
            <?php endif ?>
        </div>

    </div>

    <h3 class="headline headline-sm"><?php echo $publication->wp->post_title; ?></h3>
    <?php if($publication->acf->agenda_show_text) : ?>
        <div class="body body-lg"><?php echo $publication->acf->agenda_text ?></div>
    <?php endif ?>
    <div class="body body-lg m-agenda-thumb__type"><?php echo $type->wp->name ?></div>

    <div class="m-agenda-thumb__buttons">
    <?php if($ctas = $publication->acf->agenda_ctas): 
        ?>
        <?php foreach ($ctas as $key => $cta) :
            if($cta["lien"]['title'] != "Link"):
                View::show('atomes/a-boutton', [
                    'class_css' => 'a-boutton--outline',
                    'lien' => $cta['lien']
                ]);
            else:
                View::show('atomes/a-boutton', [
                'class_css' => 'a-boutton--outline',
                'lien' => $cta['lien'],
                'icon' => ['position' => 'left', 'svg' => Image::get_svg('icon-link'), 'alt' => 'Link'],
            ]);
            endif;
        endforeach ?>
    <?php endif ?>
    </div>

</article>