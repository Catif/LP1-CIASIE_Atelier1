<?php

namespace atelier\control;

use atelier\view as View;
use atelier\modele\Galery;

class HomeController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Accueil - PhotoMedia");
        
        $requete = Galery::where('private', '0');


        $vue = new View\HomeView($requete);
        $vue->makePage();
    }
      
}