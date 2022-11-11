<?php

namespace atelier\control;

use atelier\view as View;

class AboutController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Accueil - PhotoMedia");
        
        $vue = new View\AboutView();
        $vue->makePage();
    }
}