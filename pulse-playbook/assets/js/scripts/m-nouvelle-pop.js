;(function () {
    var comps = document.querySelectorAll('.m-nouvelle-pop')
    if (!comps || !comps.length) return
  
    comps.forEach((comp, index) => {
        const close = comp.querySelector('.js-close-pop');
        close.addEventListener('click', (e) => {
            const modifiedtime = close.dataset.modifiedtime;
            document.cookie = "lastnouvelletime=" + modifiedtime;
            comp.classList.add('js-animate-close');

            setTimeout(() => {
                comp.classList.add('hidden');
            }, 600);

            setTimeout(() => {
                comp.remove();
            }, 600);

        })
    })
  })()
  