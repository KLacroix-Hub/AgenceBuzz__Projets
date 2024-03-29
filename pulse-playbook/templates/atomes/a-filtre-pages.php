<div class="a-filtre-pages <?php echo $class_css ?>">

    <h3 class='body body-lg'><?php echo $question ?></h3>
    <div class="a-filtre-pages-responses">

        <?php if($reponses) : 
            foreach ($reponses as $key => $reponse) : 
            $lareponse = $reponse['reponse'];
            $pages = 'non';

            if($reponse['pages']) :
                $pages = implode('|', $reponse['pages']);
            endif;
            ?>
            <label>
                <input class="js-select" 
                name="select"
                data-hasquestion="<?php echo ($reponse['has_sub_question']) ? 'oui' : 'non' ?>"
                data-index="<?php echo $reponse['identifiant'] ?>"
                data-lareponse="<?php echo $lareponse; ?>"
                data-pages="<?php echo $pages ?>" 
                data-page="<?php echo $page->wp->ID ?>"
                type="radio">
                <span class="body body-md"><?php echo $lareponse; ?></span>
            </label>
            <?php endforeach ?>
        <?php endif; ?>

        <?php
            if(isset($filtres) && $filtres) : 
                foreach ($filtres as $key => $filtre) : 
                ?>
                <div class="label">
                    <span class="body body-md"><?php echo $filtre->lareponse; ?></span>
                </div>
                <?php endforeach; 
            endif; ?>

    </div>

</div>