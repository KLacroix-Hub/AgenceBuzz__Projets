<section class="m-persona-sidebar c-theme c-theme--blue-dark <?php echo $class_css; ?>">

    <h3 class="body body-highlight">Your toolbox</h3>
  
    <ul class="item">
        <li>
            <?php if ($template = $persona->acf->fiche_pdf_template):
                View::show('atomes/a-persona-lien', [
                    'type' => 'doc',
                    'document' => $template,
                    'label' => $persona->acf->fiche_pdf_template_label,
                ]);
            endif; ?>
        </li>
        <li>
            <?php
            $option = Options::get_instance();
            $page_blank_template = $option->acf->option_blank_persona;
            if($page_blank_template) : 
                $file = $page_blank_template->acf->toolbox_document;
                View::show('atomes/a-persona-lien', [
                    'type' => 'doc',
                    'document' => $file,
                    'label' => 'Blank Template',
                ]);
            endif; 
            ?>
        </li>
        <?php if ($documents = $persona->acf->persona_documents): ?>
            <?php foreach ($documents as $document): ?>
            <li>
            <?php View::show('atomes/a-persona-lien', [
                'type' => 'doc',
                'document' => $document['document'],
                'label' => $document['titre'],
            ]); ?>
            </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

    <ul class="item">
        <?php if ($journey = $persona->acf->persona_customer_journey): ?>
            <li>
            <?php View::show('atomes/a-persona-lien', [
                'type' => 'lien',
                'lien' => View::new_link('Customer journey', $journey->get_permalink())
            ]); ?>
            </li>
        <?php endif; ?>
        <?php if ($relationship_map = $persona->acf->persona_relationship_map): ?>
            <li>
            <?php View::show('atomes/a-persona-lien', [
                'type' => 'lien',
                'lien' => View::new_link('Relationship Map', $relationship_map->get_permalink())
            ]); ?>
            </li>
        <?php endif; ?>
        <?php if ($liens = $persona->acf->persona_liens): ?>
            <?php foreach ($liens as $lien): ?>
                <li>
                    <?php View::show('atomes/a-persona-lien', [
                        'type' => 'lien',
                        'lien' =>  $lien['lien'],
                    ]); ?>
                </li>
                <?php
            endforeach; ?>
        <?php endif; ?>
    </ul>

    <div class="item">
        <?php
            $custumer_group = $persona->acf->persona_custumer_group;
            $more_personas = Persona::query_by_custumer_group($custumer_group->wp->slug, [
                $persona->wp->ID,
            ]);
        ?>
        
        <?php if ($more_personas->have_posts()): ?>
        <h3 class="body body-lg title-others">Others <?php echo $custumer_group->wp->name ?> persona</h3>
        
        <?php
            foreach ($more_personas->crocus as $persona):
                $persona->show_view_thumb(['size' => 'small']);
                //View::show('molecules/m-persona-thumb', ['post' => $persona, 'size' => 'small']);
            endforeach;
        ?>
        <?php endif; ?>
    </div>
</section>