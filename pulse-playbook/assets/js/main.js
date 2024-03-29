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
  
;(function () {
  var comps = document.querySelectorAll('.m-flex-accordeon')
  if (!comps || !comps.length) return

  comps.forEach((comp, index) => {
    const items = comp.querySelectorAll('.js-item')
    if (items) {
      items.forEach((item, index) => {
        item.querySelector('.js-action').addEventListener('click', (e) => {
          
          if(item.classList.contains('active')){
            item.classList.remove('active')
          }else{
            items.forEach((_item, index) => {
              _item.classList.remove('active')
            })
  
            item.classList.add('active')

          }


        })
      })
    }
  })
})()

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

;(function () {
  var comps = document.querySelectorAll('.m-flex-onglets')
  if (!comps || !comps.length) return

  const change_tab = (button_active, comp) => {
    const buttons = comp.querySelectorAll('.js-change-tab')
    buttons.forEach((button, index) => {
      button.classList.remove('js-button-active')
    })

    const contenus = comp.querySelectorAll('.js-contenu')
    contenus.forEach((contenu, index) => {
      contenu.classList.remove('js-contenu-active')
    })

    const active = comp.querySelector('.active')
    setTimeout(() => {
      button_active.classList.add('js-button-active')
    }, 200)
    active.style.left = button_active.offsetLeft + 'px'
    active.style.height = button_active.offsetHeight + 'px'
    active.style.width = button_active.offsetWidth + 'px'
    const contenu = comp.querySelector('#' + button_active.dataset.contenu)
    contenu.classList.add('js-contenu-active')
  }

  comps.forEach((comp, index) => {
    const buttons = comp.querySelectorAll('.js-change-tab')
    buttons.forEach((button, index) => {
      if (index == 0) {
        change_tab(button, comp)
        const active = comp.querySelector('.active')
        active.classList.remove('js-no-animate')
      }
      button.addEventListener('click', (e) => {
        e.preventDefault()
        button.classList.remove('js-no-animate')
        change_tab(button, comp)
      })
    })
  })
})()

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
  
;(function () {
  var comps = document.querySelectorAll('.o-customer-journey-stages')
  if (!comps || !comps.length) return

  
  comps.forEach((comp, index) => {

    const filtres = comp.querySelectorAll('.js-stage-filtre');
    const stages = comp.querySelectorAll('.js-stage');
    const steps = comp.querySelectorAll('.js-step');

    filtres.forEach((filtre, index) => {

        filtre.addEventListener('click', (e) => {
            e.preventDefault();
            filtres.forEach((filtre, index) => {
                filtre.classList.remove('active');
            })
    
            stages.forEach((stage, index) => {
                stage.classList.remove('active');
            })

            steps.forEach((step, index) => {
                step.classList.remove('active');
            })
    
    
            filtre.classList.add('active');
    
            var id_steps = filtre.dataset.steps;
            var indexs = id_steps.split('-')

            comp.querySelector('#stage-' + indexs[0]).classList.add('active')
            comp.querySelector('#step-' + id_steps).classList.add('active')



        })
    
    })


  })

})()
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
  
;(function () {

    let todos = document.querySelectorAll('.TODO')
    if (todos) {
        todos.forEach((todo, index) => {
            var iDiv = document.createElement('div')
            iDiv.className = 'TODO--titre'
            iDiv.innerHTML = todo.classList[0]
            todo.prepend(iDiv)
        })
    }

    const lightbox = GLightbox({
        touchNavigation: true,
        autoplayVideos: true,
    })

})()
