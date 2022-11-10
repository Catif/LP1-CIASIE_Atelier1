let modal, imagesListEl, tabFile = [];

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
            divImage.querySelector('input[name="title-image-' + rang + '"]').value = (newTitlePicture== undefined) ? tabFile[rang].name : newTitlePicture;
            divImage.querySelector('input[name="tag-image-' + rang + '"]').value = (newTagPicture == undefined) ? '' : newTagPicture; 

            tabFile[rang].tag = newTagPicture
            
            console.log('valider :')
            console.log(tabFile)
    })

    modal.querySelector('.footer [dataModal="annuler"]')
        .addEventListener('click', (e) => {
            modal.classList.remove('active')
            console.log('valider')
    })
}




// Gestion d'ajout d'images
function addImage(image){
    console.log(image)
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
        tabFile.push(tab[i])
        tabFile[tabFile.length-1].title = tab[i].name;
        tabFile[tabFile.length-1].rang = tabFile.length-1;
        tabFile[tabFile.length-1].tag = ''
        addImage(tab[i])
    }
}


window.addEventListener('load', init)