<?php

namespace atelier\view;
use atelier\router\Router;
class RegisterView extends AppView {

    public function render():string{
        $r = new Router();
        $login = $r->urlFor('login');
        $html = <<<BLADE
        <div class="inscription">
            <form class="regist" action="" method="post">
                <div>
                    <h1>Inscription</h1>
                    <div>
                        <div>
                            <label>Pseudonyme</label>
                            <input type="text" name="username" required>
                        </div>
                        <div>
                            <label>Mot de passe</label>
                            <input type="password" name="password" required>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Email</label>
                            <input type="email" name="email" required>
                        </div>
                        <div>
                            <label>Vérification mot de passe</label>
                            <input type="password" name="passwordVerif" required>
                        </div>
                    </div>
                    <div>
                        <button id="inscription" type="submit">Créer</button>
                        <a href="{$login}">J'ai un compte</a>
                    </div>
                </div>
            </form>
        </div>
    BLADE;

    return $html;
}
}
