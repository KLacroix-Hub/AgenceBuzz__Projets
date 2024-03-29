;(function () {
    var comps = document.querySelectorAll('.m-filtres-pages')
    if (!comps || !comps.length) return
    
    var index = '';
    var go_to_end = false;
    var lareponse = '';
    var pages = false;
    var page = false;
    var changed = false;
    
    const btn_action = document.querySelector('.js-action');
    // const btn_prev = document.querySelector('.js-prev');
    const btn_all = document.querySelector('.js-all');
    const btn_anchor = document.querySelector('.js-anchor');
    const btn_clear = document.querySelector('.js-clear')

    var index_slide = 0;

    var filtres = [];

    const container = document.querySelector('.js-list-container');

    var splide = new Splide('.js-flex-filtres', {
        type: 'slide',
        drag:false,
        arrows:false,
        pagination: false,
    })  

    splide.on( 'moved', function (newIndex) {
        changed = false;
    });
    
    const change = () => {
        
        // Sélectionnez tous les boutons radio du groupe
        const radioInputs = document.querySelectorAll('.js-select');
        
        // Ajoutez un gestionnaire d'événement "change" à chaque bouton radio
        radioInputs.forEach(radioInput => {
            radioInput.addEventListener('change', () => {
                changed = true;
                index = radioInput.dataset.index;
                lareponse = radioInput.dataset.lareponse;
                go_to_end = (radioInput.dataset.hasquestion != 'oui');
                if(go_to_end){
                    btn_anchor.classList.remove('g-hidden');
                    btn_action.classList.add('g-hidden');
                }
                pages = radioInput.dataset.pages;
                page = radioInput.dataset.page;
            });
        });

    }

    const clear_and_all = (e) => {
        e.preventDefault();

        splide.go(0);
        setTimeout(() => {
            
            for (let i = 1; i <= index_slide; i++) {
                splide.remove(i);
            }

            setTimeout(() => {
                splide.remove('.is-next')
            }, 100);

            fetch_pages('all', page);
    
            const radioInputs = document.querySelectorAll('.js-select');
    
            radioInputs.forEach(radio => {
                radio.checked = false;
            });
    
            btn_anchor.classList.add('g-hidden');
            btn_clear.classList.add('g-hidden')
            btn_all.classList.remove('g-hidden');
            btn_action.classList.remove('g-hidden');
            index = '';
            go_to_end = false;
            lareponse = '';
            pages = false;
            index_slide = 0;
            filtres = [];
            
        }, 200);

    } 

    btn_clear.addEventListener('click', clear_and_all)
    btn_all.addEventListener('click', clear_and_all)

    // btn_prev.addEventListener('click', (e) => {
    //     e.preventDefault();
    //     splide.go( '<' );
    //     splide.remove(index_slide);
    //     index_slide = index_slide - 1;
    //     if(index_slide == 0) btn_prev.classList.add('g-hidden');
    // })

    const fetch_pages = ((pages, page, filtres = false) => {

        fetch(wami_js.siteurl + '/api/v1/pages', {
            method: 'POST',
            body: JSON.stringify({ pages: pages, page: page, filtres : filtres }),
            headers: {
                Accept: 'application/json',
            },
        })
        .then((res) => res.json())
        .then((response) => {
            
            if (response.data.tpl) {
                container.innerHTML = response.data.tpl
            }

            if (response.data.tpl_filtre) {
                const slide = document.createElement( 'li' );
                slide.classList.add( 'splide__slide' );

                slide.innerHTML = response.data.tpl_filtre;
                splide.add(slide);
                splide.go( '>' );
                index_slide = index_slide + 1

                change();

            }
            
        })  
        
    });

    const fetch_question = ((index, page) => {
        index_slide = index_slide + 1;
        fetch(wami_js.siteurl + '/api/v1/pages/question', {
            method: 'POST',
            body: JSON.stringify({ "index": index, "page": page }),
            headers: {
                Accept: 'application/json',
            },
        })
        .then((res) => res.json())
        .then((response) => {

            if (response.data.tpl_list) {

                const slide = document.createElement( 'li' );
                slide.classList.add( 'splide__slide' );
                slide.innerHTML = response.data.tpl;
                splide.add(slide);
                splide.go( '>' );
                //btn_prev.classList.remove('g-hidden')
                index_slide = index_slide + 1
                change();
            
            }

            else{
                console.log('pas de tpl');
            }

            if (response.data.tpl_list) {
                container.innerHTML = response.data.tpl_list
            }
            
        })  
        
    });

    btn_anchor.addEventListener('click', (e) => {

        if(changed){
            
            filtres.push({index : index, lareponse: lareponse});
    
            if(go_to_end){
                
                const slide = document.createElement( 'li' );
                slide.classList.add( 'splide__slide' );
                slide.innerHTML = '';
                splide.add(slide);
                splide.go( '>' );
                index_slide = index_slide + 1;
                btn_anchor.classList.remove('g-hidden');
                btn_clear.classList.remove('g-hidden')
                btn_all.classList.add('g-hidden');
                //btn_prev.classList.add('g-hidden');
                btn_action.classList.add('g-hidden');
    
                fetch_pages(pages, page, filtres)
    
            }else{
                
                fetch_question(index, page)
                btn_all.classList.add('g-hidden');
            }

        }

    })

    btn_action.addEventListener('click', (e) => {
        e.preventDefault();

        if(changed){
            
            filtres.push({index : index, lareponse: lareponse});
    
            if(go_to_end){
                
                const slide = document.createElement( 'li' );
                slide.classList.add( 'splide__slide' );
                slide.innerHTML = '';
                splide.add(slide);
                splide.go( '>' );
                index_slide = index_slide + 1;
                btn_anchor.classList.remove('g-hidden');
                btn_clear.classList.remove('g-hidden')
                btn_all.classList.add('g-hidden');
                //btn_prev.classList.add('g-hidden');
                btn_action.classList.add('g-hidden');
    
                fetch_pages(pages, page, filtres)
    
            }else{
                
                fetch_question(index, page)
                btn_all.classList.add('g-hidden');
            }

        }

    })


    splide.mount()
    change();
  })()
  