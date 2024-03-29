;(function () {
    var comps = document.querySelectorAll('.o-persona-community')
    if (!comps || !comps.length) return

    const splide = new Splide( '#o-persona-community_splide', {
        type   : 'loop',
        perPage: 2,
        perMove: 1,
        gap: '1.25rem'
    });
      
    splide.mount();
  
})()
  