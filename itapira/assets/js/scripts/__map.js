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