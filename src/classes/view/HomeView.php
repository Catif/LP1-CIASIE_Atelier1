<?php

namespace atelier\view;

class HomeView extends AppView {
    public function render() : string{
        $galleries = $this->data;
        $htmlGallery = "";
        foreach($galleries as $gallery){
            $listPicture = $gallery->pictures()->get();
            $numberPicture = count($listPicture);
            $thumbnail = $listPicture[random_int(0, $numberPicture-1)];
            $srcImage = $thumbnail->name_file;
            $galleryTitle = $gallery->title;

            $urlGallery = $this->router->urlFor('view-gallery', [['id', $gallery->id]]);
            
            $htmlGallery .= <<<BLADE

            <div class="gallery-item">
                <a href="${urlGallery}" class="gallery-content">
                    <div class="image">
                        <img src="${srcImage}" alt="Image introuvable">
                    </div>
                    <div class="text">${galleryTitle}</div>
                </a>
            </div>
            BLADE;
        }

        $html = <<<BLADE
        <h1>Galeries publiques</h1>
        <div class="gallery">
            ${htmlGallery}
        </div>
        BLADE;

        return $html;
    }
}






// <div class="gallery">
    // <div class="gallery-item">
    //     <div class="gallery-content">
    //         <div class="image">
    //             <img src="https://source.unsplash.com/1600x900/?nature" alt="nature">
    //         </div>
    //         <div class="text">Nature</div>
    //     </div>
    // </div>
// </div>
// <div id="pagination">
//     <a>Précédente</a>
//     <a>Suivante</a>
// </div>