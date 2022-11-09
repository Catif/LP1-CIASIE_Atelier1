<?php

namespace atelier\control;

use atelier\view as View;

class LoginController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Accueil - PhotoMedia");
        
        $vue = new View\LoginView();
        $vue->makePage();
    }
      
}