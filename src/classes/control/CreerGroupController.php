<?php

namespace atelier\control;

use atelier\view as View;

class GroupController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Groupe - PhotoMedia");
        
        $vue = new View\GroupView();
        $vue->makePage();
    }
      
}