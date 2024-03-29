var blocCta = document.querySelector('#bloc-cta');
var listCta = document.querySelector('#list-cta');
var blocToSwitch = document.querySelector('.main-content__projects');

listCta.addEventListener('click', function() {
    blocToSwitch.classList.add("list")
    blocCta.classList.remove("active")
    listCta.classList.add("active")
})

blocCta.addEventListener('click', function() {
    blocToSwitch.classList.remove("list")
    listCta.classList.remove("active")
    blocCta.classList.add("active")
})