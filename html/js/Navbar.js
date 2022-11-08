let navbar = document.querySelector('nav')
let openNav = document.querySelector('i[class="bi bi-list"]')

function init(){

    openNav.addEventListener('click', () => {
        navbar.classList.add('active')
    })
}