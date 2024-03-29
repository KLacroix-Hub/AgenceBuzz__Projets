<section class="o-customer-journey-stages <?php echo $class_css ?>">

    <div class="grid sm:grid-cols-24 gap-20">
        <div class='grid sm:grid-cols-24 sm:col-span-24 o-customer-journey-stages__head'>
            <div class='sm:col-span-2'></div>
            <div class="sm:col-span-22">
                <h2 class="body body-highlight">Stages</h2>
            </div>
            <div class='sm:col-span-2'></div>
            <div class="sm:col-span-20 head-stages">
                <div class="grid sm:grid-cols-7 gap-10">
                    <?php 
                    $stages = $post->acf->journey_stages;
                    if($stages) : 
                        foreach ($stages as $index => $stage) : ?>
                        <article id="stage-<?php echo $index ?>" class="stage b-radius-6 <?php echo ($index === 0) ? 'active' : ''; ?> o-customer-journey-stages-stage js-stage c-theme c-theme--<?php echo $stage['stage_theme'] ?>">
            
                            <div class="stage-header">
                                <h5 class="body body-md"><?php echo $index + 1?>. <?php echo $stage['stage_title'] ?></h5>
                            </div>
            
                            <ul class="stage-content">
                                <?php foreach ($stage['stage_steps'] as $index_step => $step) : ?>
                                    <li>
                                        <a href="#" class="js-stage-filtre o-customer-journey-stages-filtre <?php if($index === 0 && $index_step === 0) echo 'active' ?>" 
                                        data-steps="<?php echo $index . '-' . $index_step; ?>">
                                            <?php echo $step['step_title']; ?>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
            
                        </article>
                        <?php endforeach; 
                    endif; ?>
                </div>
            </div>
        </div>

        <div class="sm:col-span-24">
            
            <?php
                $step_type = Custumer_journey::get_stage_step_type();
                foreach ($stages as $index => $stage):
                    if ($stage['stage_steps']) {
                        foreach ($stage['stage_steps'] as $index_step => $step): 
                            $current_index = $index . '-' . $index_step;?>
                            <section class="js-step o-customer-journey-stages-step <?php echo ($current_index == '0-0') ? 'active' : '' ?>" id="step-<?php echo $current_index; ?>">
                                <div class="grid sm:grid-cols-24 step-single">
                                    <?php foreach ($step['step_content'] as $key => $content): ?>
                                        <div class="sm:col-span-2"></div>
                                        <div class="sm:col-span-7 o-customer-journey-stages-step__type">
                                            <img class="picto-step" src="<?php echo Image::get_url_from_theme(
                                                'picto-step-' . $content['step_content_type'] . '.svg'
                                            ); ?>" alt="Logo Saint gobain">
                                            <h3 class="body body-highlight"><?php echo $step_type['choices'][$content['step_content_type']]; ?></h3>
                                        </div>
                                        
                                        <div class="sm:col-span-14 o-customer-journey-stages-step__txt">
                                            <?php Helper::the_content($content['step_content_text']); ?>
                                        </div>
                                        
                                    <?php endforeach; ?>
                                </div>
                            </section>
                        <?php endforeach;
                    }
                endforeach;
            ?>

        </div>

        <div class="sm:col-span-24">

            <?php //View::show('organismes/o-pagination-between-page', []); ?>

        </div>

    </div>





</section>