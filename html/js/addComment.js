const addCommentBtn = document.querySelector('#addCommentBtn')
const container = document.querySelector('#comments-list')
let newComment = document.createElement('div').classList.add('#newComment')


function initAddComment(){
    // addCommentBtn.addEventListener('click', () => {
    //     addComment()
    // })
}


function addComment(){
    container.append(newComment)
    console.log(newComment)
    newComment.innerHTML = `
    <form method="POST">
        <div>
            <label>Message</label>
            <textarea name="message" autofocus maxlength="65000" required></textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>
    `
}

export default{
    initAddComment
}
