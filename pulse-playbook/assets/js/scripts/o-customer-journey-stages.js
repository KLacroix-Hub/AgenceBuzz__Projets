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