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
