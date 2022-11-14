<?php

namespace atelier\control;

use atelier\view as View;

class PictureController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Image - PhotoMedia");
        
        $vue = new View\PictureView();
        $vue->makePage();
    }
      
}