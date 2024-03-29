$('.owl-carousel').owlCarousel({
        loop:false,
        margin:20,
        nav:false,
        responsive:{
            0:{
                items:1,
                stagePadding: 40,
            },
            600:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    })
// // Initialize and add the map
// const initMap = ()=>{
//     // The location of Uluru
//     const itapira = { lat: 48.855504, lng: 2.368393 };
//     // The map, centered at Uluru
//     const map = new google.maps.Map(document.getElementById("map"), {
//       zoom: 15,
//       center: itapira,
//     });
//     // The marker, positioned at Uluru
//     const marker = new google.maps.Marker({
//       position: itapira,
//       map: map,
//     });
//   }
//   window.initMap = initMap;

function initMap() {
  // Créez un nouvel objet de carte
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 48.855504, lng: 2.3683934 }, // Coordonnées du centre de la carte
    zoom: 15, // Niveau de zoom initial
  });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: { lat: 48.855504, lng: 2.3683934 },
      map: map,
    });

  // Ajoutez d'autres fonctionnalités de la carte ou des marqueurs ici
}

// Chargez l'API Google Maps en utilisant votre clé d'API
function loadScript() {
  const script = document.createElement("script");
  script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyBx4YLWYrgnO2Pi5BxrdyUkN8ezPmKg-AE&callback=initMap`;
  script.async = true;
  script.defer = true;
  document.body.appendChild(script);
}
window.initMap = initMap;
// Appelez la fonction pour charger l'API
loadScript();
// Lorsque l'élément est cliqué, ajoutez un attribut ou une classe spéciale pour le marquer comme actif
// var elements = document.querySelectorAll('.menu-nav')[0].children;
// var home = document.querySelectorAll('#home');
// // elements = elements.push(home[0]);

// for (var i = 0; i < elements.length; i++) {
//   elements[i].addEventListener('click', function() {
//     // Supprimer l'attribut ou la classe active de tous les autres éléments
//     for (var j = 0; j < elements.length; j++) {
//       elements[j].classList.remove('active');
//     }

//     // Ajouter l'attribut ou la classe active à l'élément cliqué
//     this.classList.add('active');

//     // Enregistrer l'ID de l'élément actif dans le stockage local
//     var activeItemId = this.id;
//     localStorage.setItem('activeItem', activeItemId);
//   });
// }

// // Récupérer l'ID de l'élément actif depuis le stockage local et le marquer comme actif lors du chargement de la page
// window.addEventListener('load', function() {
//   var activeItemId = localStorage.getItem('activeItem');
//   if (activeItemId) {
//     var activeItem = document.getElementById(activeItemId);
//     if (activeItem) {
//       activeItem.classList.add('active');
//     }
//   }
// });

//Menu mobile functions

var burgerMobile = document.querySelector('.main-header__burger');
var menuMobile = document.querySelector('.menu');

burgerMobile.onclick=()=>{
  console.log('clicked');
  burgerMobile.classList.toggle('active');
  console.log(burgerMobile.classList);
  if(burgerMobile.classList.contains('active')){
    menuMobile.style.transform = 'translateX(-100%)';
  }
  else if(!burgerMobile.classList.contains('active')){
    menuMobile.style.transform = 'translateX(0)';
  }
}

document.addEventListener('DOMContentLoaded', function() {
    var links = document.querySelectorAll('a');
  
    links.forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        var href = this.getAttribute('href');
        document.querySelector('.transition').classList.add('active');
  
        setTimeout(function() {
          window.location.href = href;
        }, 2000);
      });
    });
  });
  
    //Animations header
var animationFromTo = [{
    opacity: 0,
    y: 30,
},{
    opacity: 1,
    y: 0,
    duration: 1,
    ease: "power2.out",
}];

gsap.fromTo(
    "#home>img",
    animationFromTo[0],
    animationFromTo[1]
  
)
gsap.fromTo(
    ".menu-nav__link",
    animationFromTo[0],
    {
        opacity: 1,
        y: 0,
        duration: 1,
        ease: "power2.out",
        delay:0.1,
        stagger: 0.1,
    }
)
gsap.fromTo(".catchphrase", animationFromTo[0],{
    opacity: 1,
    y: 0,
    duration: 1,
    ease: "power2.out",
    delay: 0.4,
})

gsap.fromTo("h1,h2,h3,p,a", animationFromTo[0], {
    opacity: 1,
    y: 0,
    duration: 1,
    ease: "power2.out",
    delay:0.1,
    stagger: 0.2,
})

gsap.fromTo(".wrapper-paragraphe__content", animationFromTo[0], {
    y: 0,
    duration: 1,
    ease: "power2.out",
    delay:0.1,
    stagger: 0.2,
})

gsap.fromTo(".content-Dickies", {
    opacity: 0,
    y: 120,
}, {
    opacity: 1,
    y: 0,
    duration: 1,
    ease: "power2.out",
    delay:2,
})
// trie par nom de classe

var brandsDickies = document.querySelectorAll(".Dickies")
var brandsSebago = document.querySelectorAll(".Sebago")
var brandsSuperga = document.querySelectorAll(".Superga")
var brandsYogi = document.querySelectorAll(".Yogi")
var brandsTimberland = document.querySelectorAll(".Timberland")

brandsDickies[1].addEventListener("mouseover", function(){
        brandsDickies.forEach((brandDickies,i) => {
            console.log("mouseover")
            brandDickies.style.opacity = "1"
            brandsSebago[0].style.opacity = "0"
            brandsSuperga[0].style.opacity = "0"
            brandsYogi[0].style.opacity = "0"
            brandsSebago[2].style.opacity = "0"
            brandsSuperga[2].style.opacity = "0"
            brandsYogi[2].style.opacity = "0"
            brandsTimberland[0].style.opacity = "0"
            brandsTimberland[2].style.opacity = "0"
        })
})

brandsSebago[1].addEventListener("mouseover", function(){
        brandsSebago.forEach((brandSebago,i) => {
        brandSebago.style.opacity = "1"
        brandsDickies[0].style.opacity = "0"
        brandsSuperga[0].style.opacity = "0"
        brandsYogi[0].style.opacity = "0"
        brandsDickies[2].style.opacity = "0"
        brandsSuperga[2].style.opacity = "0"
        brandsYogi[2].style.opacity = "0"
        brandsTimberland[0].style.opacity = "0"
        brandsTimberland[2].style.opacity = "0"
    })
})

brandsSuperga[1].addEventListener("mouseover", function(){
brandsSuperga.forEach((brandSuperga,i) => {
        brandSuperga.style.opacity = "1"
        brandsDickies[0].style.opacity = "0"
        brandsSebago[0].style.opacity = "0"
        brandsYogi[0].style.opacity = "0"
        brandsDickies[2].style.opacity = "0"
        brandsSebago[2].style.opacity = "0"
        brandsYogi[2].style.opacity = "0"
        brandsTimberland[0].style.opacity = "0"
        brandsTimberland[2].style.opacity = "0"
    })
})

brandsYogi[1].addEventListener("mouseover", function(){
brandsYogi.forEach((brandYogi,i) => {
        brandYogi.style.opacity = "1"
        brandsDickies[0].style.opacity = "0"
        brandsSebago[0].style.opacity = "0"
        brandsSuperga[0].style.opacity = "0"
        brandsDickies[2].style.opacity = "0"
        brandsSebago[2].style.opacity = "0"
        brandsSuperga[2].style.opacity = "0"
        brandsTimberland[0].style.opacity = "0"
        brandsTimberland[2].style.opacity = "0"
    })
})

brandsTimberland[1].addEventListener("mouseover", function(){
brandsTimberland.forEach((brandTimberland,i) => {
        brandTimberland.style.opacity = "1"
        brandsDickies[0].style.opacity = "0"
        brandsSebago[0].style.opacity = "0"
        brandsSuperga[0].style.opacity = "0"
        brandsYogi[0].style.opacity = "0"
        brandsDickies[2].style.opacity = "0"
        brandsSebago[2].style.opacity = "0"
        brandsSuperga[2].style.opacity = "0"
        brandsYogi[2].style.opacity = "0"
    })
})
// Lorsque l'élément est cliqué, ajoutez un attribut ou une classe spéciale pour le marquer comme actif
// var elements = document.querySelectorAll('.menu-nav')[0].children;
// var home = document.querySelectorAll('#home');
// // elements = elements.push(home[0]);

// for (var i = 0; i < elements.length; i++) {
//   elements[i].addEventListener('click', function() {
//     // Supprimer l'attribut ou la classe active de tous les autres éléments
//     for (var j = 0; j < elements.length; j++) {
//       elements[j].classList.remove('active');
//     }

//     // Ajouter l'attribut ou la classe active à l'élément cliqué
//     this.classList.add('active');

//     // Enregistrer l'ID de l'élément actif dans le stockage local
//     var activeItemId = this.id;
//     localStorage.setItem('activeItem', activeItemId);
//   });
// }

// // Récupérer l'ID de l'élément actif depuis le stockage local et le marquer comme actif lors du chargement de la page
// window.addEventListener('load', function() {
//   var activeItemId = localStorage.getItem('activeItem');
//   if (activeItemId) {
//     var activeItem = document.getElementById(activeItemId);
//     if (activeItem) {
//       activeItem.classList.add('active');
//     }
//   }
// });

//Menu mobile functions

var burgerMobile = document.querySelector('.main-header__burger');
var menuMobile = document.querySelector('.menu');

burgerMobile.onclick=()=>{
  burgerMobile.classList.toggle('active');
  console.log(burgerMobile.classList);
  if(burgerMobile.classList.contains('active')){
    menuMobile.style.transform = 'translateX(-100%)';
  }
  else if(!burgerMobile.classList.contains('active')){
    menuMobile.style.transform = 'translateX(0)';
  }
}

$('.owl-carousel').owlCarousel({
        loop:false,
        margin:20,
        nav:false,
        responsive:{
            0:{
                items:1,
                stagePadding: 40,
            },
            600:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    })
document.addEventListener('DOMContentLoaded', function() {
    var links = document.querySelectorAll('a');
  
    links.forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        var href = this.getAttribute('href');
        document.querySelector('.transition').classList.add('active');
  
        setTimeout(function() {
          window.location.href = href;
        }, 2000);
      });
    });
  });
  