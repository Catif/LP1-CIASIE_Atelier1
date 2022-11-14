<?php

namespace atelier\view;

class HomeView extends AppView {
    public function render() : string{
        $galleries = $this->data;
        $htmlGallery = "";
        $number = $galleries->count();

        $page = 1;
        $numberPicturePerPage = 22;
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }

        $galleries = $galleries->skip(($page-1)*$numberPicturePerPage)->take($numberPicturePerPage)->get();

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

        

        $htmlPagination = "";
        for ($i = 1; $i <= ceil($number/$numberPicturePerPage); $i++) {
            if (isset($_GET['page']) && $_GET['page'] == $i){
                $htmlPagination .= <<<BLADE
                <option value="${i}" selected>${i}</option>
                BLADE;
            } else {
                $htmlPagination .= <<<BLADE
                <option value="${i}">${i}</option>
                BLADE;
            }
        }
        $urlHere = $this->router->urlFor('home');

        $html = <<<BLADE
        <h1>Galeries publiques</h1>
        <div class="gallery">
            ${htmlGallery}
        </div>
        <form action="${urlHere}" method="get">
            <input type="hidden" name="action" value="home">
            <select name="page" onChange="this.form.submit()">
                ${htmlPagination}
            </select>
        </form>
        BLADE;

        return $html;
    }
}