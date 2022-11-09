<?php

namespace atelier\control;

use atelier\view as View;
use atelier\router\Router;
use atelier\auth\Authentification;

class RegisterController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Accueil - PhotoMedia");
        
        $r = new Router();

            if ($this->request->method === 'POST') {
                $username = filter_input(INPUT_POST, "username");
                $username = strtolower($username);
                $password = filter_input(INPUT_POST, "password");
                $passwordVerif = filter_input(INPUT_POST, "passwordVerif");
                $email = filter_input(INPUT_POST, "email");

                if ($password !== $passwordVerif) {
                    //$vue = new View\ErrorView(['error' => "Les mots de passe ne correspondent pas."]);
                    //$vue->makePage();
                    echo "Mdp différents";
                    return;
                } else {
                    Authentification::register($username, $password, $email);
                    header("Location: ".$r->urlFor("login"));
                }
            } else {

            $vue = new View\RegisterView();
            $vue->makePage();
        }

    }
}