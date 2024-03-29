;(function () {
    var comps = document.querySelectorAll('.o-children-tabs')
    if (!comps || !comps.length) return
  
    comps.forEach((comp, index) => {
        const filtres = comp.querySelectorAll('.js-select-tab');
        const container = comp.querySelector('.js-child');

        filtres.forEach((filtre, index) => {
            filtre.addEventListener('click', (e) => {
                e.preventDefault();
                const page = filtre.dataset.page;

                filtres.forEach((filtre, index) => {
                    filtre.classList.remove('active');
                })

                filtre.classList.add('active')

                fetch(wami_js.siteurl + '/api/v1/page/' + page, {
                headers: {
                    Accept: 'application/json',
                },
                })
                .then((res) => res.json())
                .then((response) => {

                    var newUrl = filtre.href;
                    var baseUrl = window.location.href.split('/').slice(0, -1).join('/');
                    var newUrlPath = newUrl.replace(baseUrl, '');

                    history.pushState(null, null, newUrl);

                    if (response.data.tpl) {
                        container.innerHTML = response.data.tpl
                    }
                })

                
                
            })
        })
    })
  })()
  