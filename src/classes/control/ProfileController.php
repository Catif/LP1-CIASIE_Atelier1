<?php

namespace atelier\control;
use atelier\modele as Modele;
use atelier\view as View;

class ProfileController extends AbstractController{
    public function execute() : void {
        View\AppView::setAppTitle("Profil - PhotoMedia");

        $data['user'] = Modele\User::find($_SESSION['user_profile']['id']);
        $data['galeries'] = $data['user']->galeries();
        
        $vue = new View\ProfileView($data);
        $vue->makePage();
    }
      
}