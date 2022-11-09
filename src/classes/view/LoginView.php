<?php

namespace atelier\view;

class LoginView extends AppView {

    public function render():string{
        $html = <<<EOF
        <div class="connexion">
            <form action="" method="post">
                <h2 id="cou">Connexion</h2>

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Mot de passe</label>
                <input type="password" name="mdp" required>

                <button id="connexion" type="submit">Connexion</button>
                <a href="">Inscritpion</a>
            </form>
        </div>
    EOF;

    return $html;
}
}
