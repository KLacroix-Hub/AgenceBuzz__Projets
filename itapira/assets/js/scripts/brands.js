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