
function init(){
    document.querySelector('#imagesUpload').addEventListener('change', (e) => {
        let files = e.target.files
        addImages(files)
    })
}







// Gestion d'ajout d'images
function addImage(image){
    console.log(image)
    let imagesListEl = document.querySelector('.images-list')
    let rang = imagesListEl.length + 1

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

    imagesListEl.appendChild(div)
}

function addImages(tab){
    console.log(tab)
    for(let i = 0; i < tab.length; i++){
        addImage(tab[i])
    }
}


window.addEventListener('load', init)