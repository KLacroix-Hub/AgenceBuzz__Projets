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
