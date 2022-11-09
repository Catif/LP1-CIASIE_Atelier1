<?php

namespace atelier\view;

class ConnexionView extends AppView {

    public function render():string{
        $html = <<<EOF
        <div class="Inscription">
            <form action="" method="post">
                <h2>Inscription</h2>

                <label>Pseudonyme</label>
                <input type="text" name="pseudo" required>

                <label>Mot de passe</label>
                <input type="password" name="mdp" required>

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Vérification mot de passe</label>
                <input type="password" name="mdp" required>
               
                <button id="isncription" type="submit">Créer</button>
                <a href="">J'ai un compte</a>
            </form>
        </div>
    EOF;

    return $html;
}
}