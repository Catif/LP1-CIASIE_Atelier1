<?php

namespace atelier\control;

use atelier\view as View;

class RegisterController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Accueil - PhotoMedia");
        
        $vue = new View\RegisterView();
        $vue->makePage();
    }
      
}