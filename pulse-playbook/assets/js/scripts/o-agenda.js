;(function () {
    var comps = document.querySelectorAll('.o-agenda')
    if (!comps || !comps.length) return
  
    comps.forEach((comp, index) => {
        const filtres = comp.querySelectorAll('.js-filtre-item');
        const container = comp.querySelector('.js-evenements');

        filtres.forEach((filtre, index) => {
            filtre.addEventListener('click', (e) => {
                e.preventDefault();
                const type = filtre.dataset.type;

                filtres.forEach((filtre, index) => {
                    filtre.classList.remove('active');
                })

                filtre.classList.add('active')

                fetch(wami_js.siteurl + '/api/v1/agenda/type/' + type, {
                headers: {
                    Accept: 'application/json',
                },
                })
                .then((res) => res.json())
                .then((response) => {
                    if (response.data.tpl) {
                        container.innerHTML = response.data.tpl
                    }
                })

                
                
            })
        })
    })
  })()
  