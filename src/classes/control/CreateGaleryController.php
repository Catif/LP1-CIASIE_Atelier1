<?php

namespace atelier\control;

use atelier\view as View;

class CreateGaleryController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Création d'une galerie - PhotoMedia");
        
        $vue = new View\CreateGaleryView();
        $vue->makePage();
    }
      
}