<?php

namespace atelier\control;

use atelier\view as View;

class CreateGroupController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Groupe - PhotoMedia");
        
        $vue = new View\CreateGroupView();
        $vue->makePage();
    }
      
}