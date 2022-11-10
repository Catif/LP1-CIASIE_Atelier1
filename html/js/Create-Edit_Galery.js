let modal, imagesListEl;

function init(){
    imagesListEl = document.querySelector('.images-list')
    modal = document.querySelector('.modal')
    console.log(modal)
    initModal();

    document.querySelector('#imagesUpload').addEventListener('change', (e) => {
        let files = e.target.files
        addImages(files)
    })
}


function initModal(){
    modal.querySelector('.footer [dataModal="valider"]')
        .addEventListener('click', (e) => {
            modal.classList.remove('active')
            let rang = modal.querySelector('#numberImage').innerText

            let newTitlePicture = modal.querySelector('.body input[name="MODAL-title-image"]').value
            let newTagPicture = modal.querySelector('.body input[name="MODAL-tag-image"]').value

            let divImage = imagesListEl.querySelector('#file-' + rang)
            
            divImage.querySelector('p').innerText = newTitlePicture

            if (newTitlePicture != ''){
                divImage.querySelector('input[name="title-image-' + rang + '"]').value = newTitlePicture
            }
            if (newTagPicture != ''){
                divImage.querySelector('input[name="tag-image-' + rang + '"]').value = newTagPicture; 
            }

    })

    modal.querySelector('.footer [dataModal="annuler"]')
        .addEventListener('click', (e) => {
            toggleScrollPage()
            modal.classList.remove('active')
            console.log('fermeture')
    })
}

function toggleScrollPage(){
    let body = document.querySelector('body')   
    body.classList.toggle('no-scroll')
}


// Gestion d'ajout d'images
function addImage(image){
    let rang = image.rang

    let div = document.createElement('div')
    div.classList.add('image-file')
    div.id = 'file-' + rang
    div.innerHTML = `
        <p title="${image.name}">${image.name}</p>
        <input type="hidden" name="title-image-${rang}" value="${image.name}">
        <input type="hidden" name="tag-image-${rang}" value="">

        <div class="image-actions">
            <i class="bi bi-pencil-square"></i>
            <i class="bi bi-x-lg"></i>
        </div>
    `

    div.querySelector('.bi-pencil-square').addEventListener('click', (e) => {
        modal.classList.add('active')
        modal.querySelector('#numberImage').innerText = rang

        let imageFile = tabFile[rang]
        console.log(imageFile)

        modal.querySelector('.body img').src = URL.createObjectURL(imageFile)
        modal.querySelector('.body input[name="MODAL-title-image"]').value = imageFile.name
        modal.querySelector('.body input[name="MODAL-tag-image"]').value = imageFile.tag
    })

    div.querySelector('.bi-x-lg').addEventListener('click', (e) => {
        imagesListEl.removeChild(div)
    })
    
    imagesListEl.appendChild(div)
}

function addImages(tab){
    for(let i = 0; i < tab.length; i++){
        addImage(tab[i])
    }
}


window.addEventListener('load', init)