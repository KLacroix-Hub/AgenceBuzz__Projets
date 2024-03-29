<div class="m-flex-telechargements <?php echo $class_css ?>" id="download">

    <div class="grid gap-10">
        <?php if($telechargements = $bloc['telechargements']) : ?>
            <?php foreach ($telechargements as $key => $telechargement) : ?>
                <div class="sm:col-span-full m-flex-telechargements-telechargement b-radius-30">
                   <div class="container">
                    <?php if($telechargement['has_miniature']): ?>
                        <img
                            class="b-radius-20" 
                            src="<?php echo Image::get_url($telechargement['miniature'], 'petite') ?>" alt=""
                        >
                        <?php else : ?>
                            // ici une icon de fichier
                        <?php endif; ?>

                        <div>
                            <h4><?php echo $telechargement['titre'] ?></h4>
                            <p><?php echo $telechargement['description'] ?></p>
                        </div>
                   </div>
                    
                    <?php
                        $document = $telechargement['fichier'];
                        $the_file = get_attached_file($document['ID']);
                        $filesize = Helper::human_filesize(filesize($the_file));
                    ?>
                  <div class="container">
                      
                  <div class="type-of-file">
                        <?php echo strtoupper($document['subtype']) ?> file <small>(<?php echo $filesize ?>)</small>
                    </div>
                    
                    <?php
                        View::show('atomes/a-boutton', [
                            'class_css' => 'a-boutton--outline',
                            'lien' => View::new_link('Download', $document['url']),
                            'attribute' => 'download',
                        ]);
                    ?>

                  </div>

                </div>
                
            <?php endforeach ?>
                
        <?php endif ?>
    </div>

</div>