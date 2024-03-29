;(function () {
    var comps = document.querySelectorAll('.o-filtres')
    if (!comps || !comps.length) return

    /**
     * Récuperer les datas via l'API
     * @param {*} filters 
     * @param {*} type 
     */
    const fetch_datas = ((filters, type) => {

        const container = document.querySelector('.js-post-container');

        fetch(wami_js.siteurl + '/api/v1/' + type, {
            method: 'POST',
            body: JSON.stringify({ filters: filters }),
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
        
    });
    
    comps.forEach((comp, index) => {
        const filtres = comp.querySelectorAll('.js-filtre');
        const bouton_reset = comp.querySelector('.js-reset-filtres');
        const boutons_open = comp.querySelectorAll('.js-filtres-title');
        const type = comp.dataset.type;
        
        /**
         * On réinisialise les filtres
         */
        bouton_reset.addEventListener('click',  (e) => {
            e.preventDefault();
            filtres.forEach((checkbox, index) => {
               checkbox.checked = false;
            })

            bouton_reset.classList.add('g-hidden');
            fetch_datas([], type);

        })

        /**
         * On Ouvre / ferme les blocs de filtres
         */
        boutons_open.forEach((button, index) => {
            button.addEventListener('click',  (e) => {
                e.preventDefault();
                var current_filtres = button.closest('.js-filtres');
                current_filtres.classList.toggle('open')
                current_filtres.classList.toggle('close')
            })
        })

        /**
         * On filtres les datas
         */
        filtres.forEach((checkbox, index) => {
            checkbox.addEventListener('change', (e) => {
                e.preventDefault();
                var current_filtres = checkbox.closest('.js-filtres');

                if(checkbox.checked){
                    
                    if(checkbox.name == 'all'){
    
                        current_filtres.querySelectorAll('.js-filtre').forEach((checkbox) => {
                            if(checkbox.name != 'all') checkbox.checked = false;
                        })
    
                    }else{
                        
                        current_filtres.querySelector('.js-filtre-all').checked = false;
    
                    }

                }

                /** On format les filtres */
                const all_filtres = comp.querySelectorAll('.js-filtres');
                let params = {};
                all_filtres.forEach((filtre, index) => {
                    var checkboxes = filtre.querySelectorAll('input[type="checkbox"]');
                    const taxo = filtre.dataset.taxo;
                    params[taxo] = [];
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].checked && checkboxes[i].name != 'all') {
                            params[taxo].push(checkboxes[i].value);
                        }
                    }
                })
                
                /** On appel l'api */
                bouton_reset.classList.remove('g-hidden');
                fetch_datas(params, type)
                
            })
        })
    })
  })()
  