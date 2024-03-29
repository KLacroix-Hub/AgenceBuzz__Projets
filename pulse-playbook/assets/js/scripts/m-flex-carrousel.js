;(function () {
  var comps = document.querySelectorAll('.m-flex-carrousel')
  if (!comps || !comps.length) return

  var splide = new Splide('.js-flex-carrousel', {
    type: 'loop',
    padding: '5rem',
    gap: '1.25rem',
    arrows: false,

    breakpoints: {
      576: {
        paginaion: false,
        perPage: 1,
        padding: '50px',
      },
    },
  })

  splide.mount()
  
})()
