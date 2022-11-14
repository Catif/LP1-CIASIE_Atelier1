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
        
        $pics = $gallery->pictures()->skip(($page-1)*$numberPicturePerPage)->take(22)->get();

        foreach($pics as $p){
            $urlPic = $this->router->urlFor('picture', [['id',$p->id]]);
            $srcImg = $p->name_file;
            $titleImg = $p->title;

            $htmlPicture .= <<<BLADE
            <a href="${urlPic}">
                <img src="${srcImg}">
                <span>${titleImg}</span>
            </a>
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

        $urlHere = $this->router->urlFor('view-gallery');

        $htmlPagination = "";
        for ($i = 1; $i <= ceil($number/$numberPicturePerPage); $i++) {
            if (isset($_GET['page'])){
                $htmlPagination .= <<<BLADE
                <option value="${i}" selected>${i}</option>
                BLADE;
            } else {
                $htmlPagination .= <<<BLADE
                <option value="${i}">${i}</option>
                BLADE;
            }
        }
        
        $urlEditGallery= $this->router->urlFor('edit-galery', [['id', $idGallery]]);
        $htmlEditGallery = '';
        if (isset($_SESSION['user_profile'])){
            
            $user = $gallery->users()->withPivot('role')->where('role', 'owner')->orWhere('role', 'colaborator')->first();
            if ($user){
                $htmlEditGallery = <<<BLADE
                <a href="${urlEditGallery}">Editer la galerie</a>
                BLADE;
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

        <div class="container">
            ${htmlPicture}
        </div>

        <div class="info-comp">
            
            <div>
                <form action="${urlHere}" method="get">
                    <input type="hidden" name="action" value="view-gallery">
                    <input type="hidden" name="id" value="${idGallery}">
                    <select name="page" onChange="this.form.submit()">
                        ${htmlPagination}
                    </select>
                </form>
            </div>
            
        </div>
        BLADE;

        return $html;
    }
}