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
