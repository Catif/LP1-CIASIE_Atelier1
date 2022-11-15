<?php

namespace atelier\view;

class GalleryView extends AppView {
    public function render() : string{
        $gallery = $this->data;
        $number = $gallery->pictures()->count();
        $htmlPicture = "";

        $page = 1;
        $numberPicturePerPage = 22;
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
        
        $pics = $gallery->pictures()->skip(($page-1)*$numberPicturePerPage)->take($numberPicturePerPage)->get();


        foreach($pics as $p){
            $urlPic = $this->router->urlFor('picture', [['id',$p->id]]);
            $srcImg = $p->name_file;
            $titleImg = $p->title;

            $htmlPicture .= <<<BLADE
            <div class="gallery-item">
                <a href="${urlPic}" class="gallery-content">
                    <div class="image">
                        <img src="${srcImg}" alt="Image introuvable">
                    </div>
                    <div class="text">${titleImg}</div>
                </a>
            </div>
            BLADE;
        }

        $tags = \atelier\modele\Tag::where('id', '=', $this->request->get['id'])->get();
        $htmlTag = '';


        foreach($tags as $tag){
            $htmlTag.= $tag->name . ', ';
        }
        
        $titleGallery = $gallery->title;
        $userGallery = $gallery->users()->withPivot('role')->where('role', 'owner')->first();
        $nameUserGallery = $userGallery->username;
        
        $dateGallery = $gallery->created_at;
        $dateGallery = date('d/m/Y', strtotime($dateGallery));

        $idGallery = $gallery->id;
        $descGallery = $gallery->description;

        $urlHere = $this->router->urlFor('view-gallery');

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
        
        $htmlEditGallery = '';
        if (isset($_SESSION['user_profile'])){
            $user = $gallery->users()->withPivot('role')->where('id', $_SESSION['user_profile']['id'])->first();
            if ($user){
                if ($user->pivot->role == 'owner' || $user->pivot->role == 'colaborator'){
                    $urlEditGallery= $this->router->urlFor('edit-galery', [['id', $idGallery]]);
                    $htmlEditGallery = <<<BLADE
                    <a href="${urlEditGallery}" id="edit-galery-btn">Editer la galerie</a>
                    BLADE;
                }
            }
        }

        $html = <<<BLADE
        
        ${htmlEditGallery}

        <div class="info">
            <p>Titre : ${titleGallery}</p>
            <p>Auteur : ${nameUserGallery}</p>
            <p>Date de création : ${dateGallery}</p>
            <p>Tags : ${htmlTag}</p>
            <p>Nombre d'images : ${number}</p>
        </div>
        <div class="desc">
            <p>Description : ${descGallery}</p>
        </div>
        <div class="gallery">
            ${htmlPicture}
        </div>
        <form action="${urlHere}" method="get">
            <input type="hidden" name="action" value="view-gallery">
            <input type="hidden" name="id" value="${idGallery}">
            <select name="page" onChange="this.form.submit()">
                ${htmlPagination}
            </select>
        </form>
        BLADE;

        return $html;
    }
}