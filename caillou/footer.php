<footer class="main-footer">
    <div class="main-footer__container">
        <h1 class="headline headline-md">Camille Plunian</h1>
        <div class="main-footer__infos">
            <div class="main-footer__infos-contact">
                <a class="body body-xl" href="tel:+33663216091">0663216091</a>
                <a class="body body-xl" href="mailto:camillexcaillou@gmail.com">camillexcaillou@gmail.com</a>
            </div>
            <p class="body body-xl main-content__address">Paris, 75020</p>
        </div>
    </div>
    <nav class="main-footer__nav">
        <div class="link-container">
            <a class="main-footer__nav__projects headline headline-md" href="<?php echo home_url();?>">Projets <span class="headline-highlight">(<?php echo wp_count_posts('projets')->publish; ?>)</span></a>
        </div>
        
        <div class="link-container">
            <a class="main-footer__nav__about headline headline-md" href="<?php echo home_url("a-propos");?>">A propos</a>
        </div>
    </nav>
</footer>
    </div>  <!-- end #main -->

<?php wp_footer(); ?>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/owl/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js" integrity="sha512-H6cPm97FAsgIKmlBA4s774vqoN24V5gSQL4yBTDOY2su2DeXZVhQPxFK4P6GPdnZqM9fg1G3cMv5wD7e6cFLZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDy8SkUy0Jll4saMswl0jeg5NxAt9NSc-4&callback=initMap&v=weekly"
      defer
    ></script> -->
<script type="module" src="<?php echo get_template_directory_uri();?>/assets/js/main.js" defer></script>
</body>

</html>
