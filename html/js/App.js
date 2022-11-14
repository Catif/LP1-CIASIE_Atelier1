import Nav from './Navbar.js'
import addComment from './addComment.js'

function init(){
    Nav.initNav()
    addComment.initAddComment()
}

window.addEventListener('load', init)