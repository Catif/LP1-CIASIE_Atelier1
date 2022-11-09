<?php

namespace atelier\control;

use atelier\view as View;

class ProfileController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Profil - PhotoMedia");
        
        $vue = new View\ProfileView();
        $vue->makePage();
    }
      
}