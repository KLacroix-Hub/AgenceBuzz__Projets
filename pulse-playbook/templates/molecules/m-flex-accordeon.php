<section class="m-flex-accordeon <?php echo $class_css; ?>">

    <?php foreach ($bloc['onglets'] as $key => $question): ?>
        <article class="m-flex-accordeon-item js-item b-radius-30 c-theme--theming-content <?php echo $key == 0 ? 'active' : ''; ?>">
            <div class="m-flex-accordeon-item-header js-action">
                <h4><?php echo $question['titre']; ?></h4>
                <button class="open">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10" fill="none">
                    <g clip-path="url(#clip0_207_220929)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4807 0.865913C14.7765 0.161785 13.6349 0.161786 12.9308 0.865913L8.37746 5.41924L3.82412 0.86589C3.11999 0.161763 1.97837 0.161763 1.27425 0.86589C0.57012 1.57002 0.570121 2.71163 1.27425 3.41576L7.09617 9.23769C7.09828 9.23981 7.10039 9.24194 7.10251 9.24406C7.80664 9.94818 8.94826 9.94818 9.65238 9.24406L15.4807 3.41578C16.1848 2.71166 16.1848 1.57004 15.4807 0.865913Z"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_207_220929">
                    <rect width="17" height="9.78788" fill="white" transform="translate(0 0.106201)"/>
                    </clipPath>
                    </defs>
                    </svg>
                </button>
            </div>
            <div class="m-flex-accordeon-item-content">
                <?php echo $question['contenu']; ?>
            </div>
        </article>
    <?php endforeach; ?>

</section>