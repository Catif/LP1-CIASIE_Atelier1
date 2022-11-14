<?php

namespace atelier\control;

use atelier\auth\Authentification;
use atelier\view as View;
use atelier\router\Router;

class LoginController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Accueil - PhotoMedia");
        
        $r = new Router();

            if($this->request->method === 'POST'){
                $email = filter_input(INPUT_POST, "email");
                $email = strtolower($email);

                $password = filter_input(INPUT_POST, "password");
                
                Authentification::login($email,$password);
                header("Location: ".$r->urlFor("home"));
            } else {
            
            $vue = new View\LoginView();
            $vue->makePage();
            
        }
    }
}