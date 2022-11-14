<?php

namespace atelier\control;

use atelier\auth\Authentification;
use atelier\view as View;
use atelier\router\Router;

class LogoutController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Déconnexion - PhotoMedia");
        
        Authentification::logout();
        
        $router = new Router();
        header("Location: ". $router->urlFor("home"));
        die();
    }
}