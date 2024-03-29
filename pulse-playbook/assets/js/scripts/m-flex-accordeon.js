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
