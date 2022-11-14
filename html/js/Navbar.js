let navbarEl = document.querySelector('nav')
let openNavEl = document.querySelector('i[class="bi bi-list"]')
let closeNavEl = document.querySelector('i[class="bi bi-plus-lg"]')

function initNav(){
    openNavEl.addEventListener('click', () => {
        openNav()
    })
    closeNavEl.addEventListener('click', () => {
        closeNav()
    })
}

function openNav(){
    navbarEl.classList.add('active')
}
function closeNav(){
    navbarEl.classList.remove('active')
}

export default {
    initNav
}