let modal, imagesListEl, tabFile, buttonSubmit;

function init(){
    modal = document.querySelector('.modal')
    imagesListEl = document.querySelector('.images-list')
    tabFile = []
    buttonSubmit = document.querySelector('.list-button button[type="submit"]')

    initModal();

    document.querySelector('#imagesUpload').addEventListener('change', (e) => {
        let files = e.target.files
        addImages(files)
    })
}




function moreThan2mb(file){
    if (file.size > 2000000){
        return true
    }
}







// ===========================
//    Gestion Ajout d'image
// ===========================
function addImages(tab){
    imagesListEl.innerHTML = ""
    tabFile = []

    let tabPictureUpload = Array.from(tab)
    buttonSubmit.disabled = true;

    try {
        if (tabPictureUpload.length > 0 && tabPictureUpload.length <= 4){
            buttonSubmit.disabled = false;
                tabPictureUpload.forEach((image, index) => {
                    if (moreThan2mb(image)){
                        throw new Error('Une des images est trop lourde. (2Mo max / image)');
                    }
                    image.rang = index;
                    tabFile.push(image)
                    addImage(image)
                })
            

        } else if (tabPictureUpload.length > 4){
            throw new Error('Vous ne pouvez pas ajouter plus de 4 images à la fois.');

        } else if (tabPictureUpload.length == 0){
            imagesListEl.innerHTML = `<p>Aucune image pour le moment...</p>`;
        }
    } catch (e) {
        buttonSubmit.disabled = true;
        imagesListEl.innerHTML = `<p style="color:#FF0000">${e.message}</p>`;
        setTimeout(() => alert(e.message), 1)
    }
}

function addImage(image){
    let rang = image.rang

    let div = document.createElement('div')
    div.classList.add('image-file')
    div.id = 'file-' + rang
    div.innerHTML = `
        <img src="${URL.createObjectURL(image)}" alt="Image ${rang + 1}">
        <p title="${image.name}">${image.name}</p>
        <input type="hidden" name="title-image-${rang}" value="${image.name}">
        <input type="hidden" name="tag-image-${rang}" value="">

        <div class="image-actions">
            <i class="bi bi-pencil-square"></i>
        </div>
    `

    div.querySelector('.bi-pencil-square').addEventListener('click', (e) => {
        openModal(rang)
    })
    
    imagesListEl.appendChild(div)
}

















// ===========
//    MODAL
// ===========
function initModal(){
    modal.querySelector('.footer [dataModal="valider"]')
        .addEventListener('click', (e) => {
            let rang = modal.querySelector('#numberImage').innerText
            rang = parseInt(rang) - 1

            let newTitlePicture = modal.querySelector('.body input[name="MODAL-title-image"]').value
            let newTagPicture = modal.querySelector('.body input[name="MODAL-tag-image"]').value

            let divImage = imagesListEl.querySelector('#file-' + rang)
            console.log(divImage)
            
            if (newTitlePicture){
                divImage.querySelector('p').innerText = newTitlePicture
                divImage.querySelector('input[name="title-image-' + rang + '"]').value = newTitlePicture
            }

            if (newTagPicture){
                divImage.querySelector('input[name="tag-image-' + rang + '"]').value = newTagPicture; 
            } else {
                divImage.querySelector('input[name="tag-image-' + rang + '"]').value = '';
            }

            closeModal()
    })

    modal.querySelector('.footer [dataModal="annuler"]')
        .addEventListener('click', (e) => {
            closeModal()
            modal.classList.remove('active')
            console.log('fermeture')
    })
}

function openModal(rang){
    modal.querySelector('#numberImage').innerText = rang + 1 

    let titleImage = imagesListEl.querySelector(`input[name="title-image-${rang}`).value
    let tagImage = imagesListEl.querySelector(`input[name="tag-image-${rang}`).value

    let image = tabFile[rang]

    modal.querySelector('.body img').src = URL.createObjectURL(image)

    modal.querySelector('.body input[name="MODAL-title-image"]').value = titleImage
    modal.querySelector('.body input[name="MODAL-tag-image"]').value = tagImage

    modal.querySelector('.body input[name="MODAL-title-image"]').disabled = false
    modal.querySelector('.body input[name="MODAL-tag-image"]').disabled = false

    modal.classList.add('active')
    document.body.classList.add('no-scroll')
}

function closeModal(){
    modal.querySelector('#numberImage').innerText = ''
    modal.querySelector('.body img').src = ''

    modal.querySelector('.body input[name="MODAL-title-image"]').value = ''
    modal.querySelector('.body input[name="MODAL-tag-image"]').value = ''

    modal.querySelector('.body input[name="MODAL-title-image"]').disabled = true
    modal.querySelector('.body input[name="MODAL-tag-image"]').disabled = true

    modal.classList.remove('active')
    document.body.classList.remove('no-scroll')
}

















window.addEventListener('load', init)