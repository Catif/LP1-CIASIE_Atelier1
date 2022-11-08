<?php

namespace atelier\control;

use atelier\view as View;

class HomeController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Accueil - PhotoMedia");
        
        $vue = new View\HomeView();
        $vue->makePage();
    }
      
}