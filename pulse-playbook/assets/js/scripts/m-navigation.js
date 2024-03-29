;(function () {
   if(window.innerWidth > 768) {
    var comp = document.querySelector('.m-navigation')
    if (!comp) return

    const hero = document.querySelector('.js-hero')
    const boutton_white = document.querySelector('.a-boutton--white')
    const boutton_extraordinary = document.querySelector('.a-boutton--extraordinary')
    const boutton_orange_white = document.querySelector('.a-boutton--orange-white')
    const threshold = 0; // Définissez une marge de seuil en pixels

    const is_element_out_of_view = (element) => {
        const elementRect = element.getBoundingClientRect();
        const windowHeight = window.innerHeight;

        return (
            elementRect.bottom < -threshold || // Élément au-dessus de la zone de vue
            elementRect.top > windowHeight + threshold // Élément en dessous de la zone de vue
        );
    }

    const handle_scroll = () => {
        if (is_element_out_of_view(hero)) {
            comp.classList.add('m-navigation--scrolled')
            
            boutton_white.classList.remove('a-boutton--white');
            boutton_white.classList.add('a-boutton--blue-dark');
            
            boutton_extraordinary.classList.add('a-boutton--extraordinary-red');
            
            boutton_orange_white.classList.remove('a-boutton--orange-white');
            boutton_orange_white.classList.add('a-boutton--orange');

        } else {
            // Faire quelque chose lorsque l'élément est dans la zone de vue
            comp.classList.remove('m-navigation--scrolled')
            boutton_white.classList.add('a-boutton--white');
            boutton_white.classList.remove('a-boutton--blue-dark');
            boutton_extraordinary.classList.remove('a-boutton--extraordinary-red');
            boutton_orange_white.classList.add('a-boutton--orange-white');
            boutton_orange_white.classList.remove('a-boutton--orange');
        }
    }
    
    window.addEventListener('scroll', handle_scroll);

    
   }
   const burgerMenu = document.querySelector('.burger-menu')
   const burgerMenuScrolled = document.querySelector('.burger-menu-two')
   const burgerMenuClose = document.querySelector('.burger-menu-close')

   burgerMenu.addEventListener('click', function() {
       document.querySelector(".menu-container").classList.add('active');
   })

   burgerMenuScrolled.addEventListener('click', function() {
       document.querySelector(".menu-container").classList.add('active');
   })

   burgerMenuClose.addEventListener('click', function() {
       document.querySelector(".menu-container").classList.toggle('active');
   })
})()
  