<?php

namespace atelier\control;

use atelier\view as View;

class ModifyGroupController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Groupe - PhotoMedia");
        
        $vue = new View\ModifyGroupView();
        $vue->makePage();
    }
      
}