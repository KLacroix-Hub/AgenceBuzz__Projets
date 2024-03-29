<?php $custumer_group = $persona->acf->persona_custumer_group; ?>
<div class="m-persona-info <?php echo $class_css ?>">

    <div class="grid sm:grid-cols-16 gap-20">
      <div class="sm:col-span-4">
        <div class="personas-photo">
          <?php
          $default = false;
          $photo = $persona->acf->persona_photo;
          if (!$photo) $default = Image::get_url_from_theme('persona-default.png');
          ?>
          <img src="<?php echo Image::get_url($photo,'petite', $default ); ?>" alt="">
        </div>
      </div>
      <div class="sm:col-span-12">
        <div class="personas-metas">
          <div class="grid sm:grid-cols-12 gap-20">
            <div class="sm:col-span-4">
              <div class="infos">
                <h1 class="personas-name headline headline-md">
                  <?php echo $persona->wp->post_title; ?></h1>
                <div class="tag-list">
                  <?php if ($specialties = $persona->acf->persona_specialty):
                      foreach ($specialties as $key => $specialty): ?>
                      <a href="" class="ui-tag body body-md">
                        <?php echo $specialty->wp->name; ?></a>
                    <?php endforeach;
                  endif; ?>
                  <?php if ($custumer_group): ?>
                    <a href="" class="ui-tag body body-md">
                      <?php echo $custumer_group->wp->name; ?></a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="sm:col-span-8">
                <div class="grid sm:grid-cols-1 gap-20">
                    <div class="ligne ligne-1 c-theme c-theme--blue-dark">
                        <div class="meta ">
                            <div class="meta-label body body-xl">Location</div>
                            <div class="meta-value body body-tab">
                                <?php $persona->show_metas('persona_location'); ?>
                            </div>
                        </div>
                        <div class="meta">
                            <div class="meta-label body body-xl">Age</div>
                            <div class="meta-value body body-tab">
                                <?php echo ($metas = $persona->acf->persona_age)
                                    ? $metas
                                    : '-'; ?>
                            </div>
                        </div>
                       
                    </div>
                    <div class="ligne ligne-2 c-theme c-theme--blue-dark">
                      <div class="meta">
                            <div class="meta-label body body-xl">Sustainability oriented</div>
                            <div class="meta-value body body-tab">
                                <div class="dotoriented">
                                <?php
                                $nb_dote = 5;
                                $nb_active = (int) $persona->acf->persona_sustainability;
                                for ($i = 0; $i < $nb_dote; $i++):
                                    $active = $i < $nb_active ? 'active' : ''; ?>
                                    <span class="<?php echo $active; ?>"></span>
                                <?php
                                endfor;
                                ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="meta">
                            <div class="meta-label body body-xl">Key performance indicator</div>
                            <div class="meta-value body body-tab">
                                <?php echo $persona->acf->persona_performance; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>