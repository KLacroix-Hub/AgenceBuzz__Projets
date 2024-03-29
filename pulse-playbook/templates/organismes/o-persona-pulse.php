<section class="o-persona-pulse <?php echo $class_css ?>">
    
    <div class="grid sm:grid-cols-24 gap-20">
        <div class="sm:col-span-24">
                <?php View::show('molecules/m-persona-back', []); ?>
        </div>
        <div class="sm:col-span-2"></div>
        <div class="sm:col-span-5">
            <?php View::show('molecules/m-persona-sidebar', ['persona' => $persona]); ?>
        </div>
        <div class="sm:col-span-1"></div>
        <div class="sm:col-span-14">
            <div class="grid gap-20">
                <?php
                View::show('molecules/m-persona-info', ['persona' => $persona]);
                View::show('molecules/m-persona-content', ['persona' => $persona]);
                ?>
            </div>
        </div>
    </div>

</section>