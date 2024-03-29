var Item = [...document.getElementsByClassName('about-lists__item')]

Item.forEach(element => {
        const text = element.children[0]
        const img = element.children[1]

        text.addEventListener('mouseenter',()=>{
                img.style.opacity = "1"
        })

        text.addEventListener('mouseleave',()=>{
                img.style.opacity = "0"
        })

});
