let modal, oldImagesListEl, buttonSubmit;

function init() {
  modal = document.querySelector(".oldPicture .modal");
  oldImagesListEl = document.querySelector(".oldPicture .images-list");
  let listImage = Array.from(oldImagesListEl.children);

  listImage.forEach((image) => {
    image.querySelector(".bi-pencil-square").addEventListener("click", (e) => {
      let idPicture = image.id.replace("image-", "");
      let title = image.querySelector("p").textContent;
      let tag = image.querySelector('input[name="tagPicture"]').value;
      let srcImage = image.querySelector("img").src;

      openModal(idPicture, title, tag, srcImage);
    });
  });

  initModal();

  document.querySelector("#imagesUpload").addEventListener("change", (e) => {
    let files = e.target.files;
    addImages(files);
  });
}

// ===========
//    MODAL
// ===========
function initModal() {
  modal
    .querySelector('.footer [dataModal="annuler"]')
    .addEventListener("click", (e) => {
      closeModal();
    });
}

function openModal(id, title, tag, srcImage) {
  modal.querySelector(".body img").src = srcImage;

  modal.querySelector('.body input[name="MODAL-title-image"]').value = title;
  modal.querySelector('.body input[name="MODAL-tag-image"]').value = tag;
  modal.querySelector('.body input[name="MODAL-id-image"]').value = id;

  modal.classList.add("active");
  document.body.classList.add("no-scroll");
}

function closeModal() {
  modal.querySelector(".body img").src = "";

  modal.querySelector('.body input[name="MODAL-title-image"]').value = "";
  modal.querySelector('.body input[name="MODAL-title-image"]').value = "";
  modal.querySelector('.body input[name="MODAL-id-image"]').value = "";

  modal.classList.remove("active");
  document.body.classList.remove("no-scroll");
}

window.addEventListener("load", init);
