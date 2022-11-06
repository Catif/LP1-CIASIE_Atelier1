<?php

namespace atelier\view;

class HomeView extends AppView {
    public function render() : string{
        $html = <<<EOF
            <h2>Accueil</h2>
            <p>Bienvenue sur le site de l'atelier de programmation web</p>
        EOF;

        return $html;
    }
}