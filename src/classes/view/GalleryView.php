<?php

namespace atelier\view;

class GalleryView extends AppView {
    public function render() : string{
        $gallery = $this->data;
        $user = $gallery->users()->withPivot('role')->where('role', 'owner')->first();   
        $pics = \atelier\modele\Picture::where('id_galery', '=', $this->request->get['id'])->get();
        $number = $pics->count();
        $htmlPicture = "";
        foreach($pics as $p){
            $urlPic = $this->router->urlFor('picture', [['id',$p->id]]);

            $htmlPicture .= <<<EOT
            <a href="${urlPic}">
                <img src="${p->namefile}">
                <span>${p->title}</span>
            </a>
            EOT;
        }
        $tags = \atelier\modele\Tag::where('id', '=', $this->request->get['id'])->get();
        $htmlTag = '';

        foreach($tags as $tag){
            $htmlTag.= $tag->name . ', ';
        }
        
        $html = <<<EOF

            <div class="info">
                <p>Titre : {$gallery->title}</p>
                <p>Auteur : {$user->username}</p>
                <p>Date de création : {$gallery->created_at}</p>
            </div>

            <div class="container">
                ${htmlPicture}
            </div>

            <div class="info-comp">
                <p>Tags : ${htmlTag}</p>
                <div></div>
                <p>Nombre : ${number}</p>
            </div>
        EOF;

        return $html;
    }
}