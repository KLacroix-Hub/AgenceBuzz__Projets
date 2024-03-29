<div class="m-persona-content <?php echo $class_css ?>">

    <?php 
    $blocs = [
        [
            'title' => 'Story',
            'field' => 'persona_story',
            'icon' => 'picto-story.svg',
            'class_css' => '',
            'atome' => 'content'
        ],
        [
            'title' => 'Drivers',
            'field' => 'persona_drivers',
            'icon' => 'picto-drivers.svg',
            'class_css' => '',
            'atome' => 'list'
        ],
        [
            'title' => 'Work Routines',
            'field' => 'persona_work_routines',
            'icon' => 'picto-routines.svg',
            'class_css' => '',
            'atome' => 'content'
        ],
        [
            'title' => 'Digital Habits',
            'field' => 'persona_digital_habits',
            'icon' => 'picto-digital-habits.svg',
            'class_css' => '',
            'atome' => 'content'
        ],
        [
            'title' => 'Needs',
            'field' => 'persona_needs',
            'icon' => 'picto-needs.svg',
            'class_css' => 'green',
            'atome' => 'content'
        ],
        [
            'title' => 'Frustrations',
            'field' => 'persona_frustrations',
            'icon' => 'picto-frustrations.svg',
            'class_css' => 'red',
            'atome' => 'content'
        ],
    ];
    ?>

    <div class="grid sm:grid-cols-16 gap-20">
        <div class="sm:col-span-8">
            <div class="grid gap-20">
                <?php for ($i=0; $i < 3; $i++) :
                    $bloc = $blocs[$i];
                    $bloc['persona'] = $persona;
                    View::show('atomes/a-persona-' .  $bloc['atome'], $bloc);
                endfor ?>
            </div>
        </div>
        <div class="sm:col-span-8">
            <div class="grid gap-20">
                <?php for ($i=3; $i <= 5; $i++) :
                    $bloc = $blocs[$i];
                    $bloc['persona'] = $persona;
                    View::show('atomes/a-persona-' .  $bloc['atome'], $bloc);
                endfor ?>
            </div>
        </div>
    </div> 

</div>