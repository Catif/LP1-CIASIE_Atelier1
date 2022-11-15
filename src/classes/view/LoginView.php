<?php

namespace atelier\view;
use atelier\router\Router;

class LoginView extends AppView {

    public function render():string{
        $r = new Router();
        $register = $r->urlFor('register');
        $html = <<<EOF
        <div class="connexion">
            <form class="login" action="" method="post">
                <h1>Connexion</h2>

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Mot de passe</label>
                <input type="password" name="password" required>

                <button id="connexion" type="submit">Connexion</button>
                <a href="{$register}">Inscritpion</a>
            </form>
        </div>
    EOF;

    return $html;
}
}
