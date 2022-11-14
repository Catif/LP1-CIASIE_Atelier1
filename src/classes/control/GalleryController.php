<?php

namespace atelier\control;

use atelier\view as View;
use atelier\view\GalleryView;

class GalleryController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Gallery - PhotoMedia");
        $requete = \atelier\modele\Galery::where('id', $this->request->get['id'])->first();
        
        $vue = new GalleryView($requete);
        $vue->makePage();
    }
      
}