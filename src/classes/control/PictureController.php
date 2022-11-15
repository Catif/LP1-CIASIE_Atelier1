<?php

namespace atelier\control;
use atelier\router\Router;
use atelier\view as View;

class PictureController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Image - PhotoMedia");

        $router = new Router();

        if (isset($_GET['id'])){
            if (is_numeric($_GET['id'])){
                $view = new View\PictureView();
                $view->render();
            } else {
                $urlHome = $router->urlFor('home');
                header('Location: ' . $urlHome);
                die();
            }
        } else {
            $urlHome = $router->urlFor('home');
            header('Location: ' . $urlHome);
            die();
        }


        $vue = new View\PictureView();
        $vue->makePage();
    }
      
}