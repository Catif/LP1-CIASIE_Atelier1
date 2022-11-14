<?php

namespace atelier\control;
use atelier\view as View;

class PictureController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Image - PhotoMedia");
        if (isset($_GET['id'])){
            if (is_numeric($_GET['id'])){
                $view = new View\PictureView();
                $view->render();
            } else {
                $urlHome = $this->router->getRouteUrl('home');
                header('Location: ' . $urlHome);
                die();
            }
        } else {
            $urlHome = $this->router->getRouteUrl('home');
            header('Location: ' . $urlHome);
            die();
        }


        $vue = new View\PictureView();
        $vue->makePage();
    }
      
}