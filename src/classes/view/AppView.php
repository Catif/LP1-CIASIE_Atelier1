<?php

namespace atelier\view;

use atelier\auth\Authentification;
use Illuminate\Contracts\Auth\Authenticatable;

abstract class AppView extends AbstractView implements Renderer{
    /* Méthode makeBody 
     * 
     * Retourne le contenu HTML de la balise body autrement dit le
     * contenu du document. 
     *
     * 
     * Note : cette méthode est à définir dans les classes concrètes
     * des vues, elle est appelée depuis la méthode render ci-dessous.
     * 
     * Retourne : 
     *
     * - Le contenu HTML complet entre les balises <body> </body> 
     *
     */
    protected function makeBody(): string {
        $article = $this->render();
        $navbar = $this->makeNavbar();
        $idSection = $this->router->getAction();

        return <<<BLADE
            <header>
                ${navbar}
            </header>

            <section id="${idSection}">
                ${article}
            </section>
        BLADE;
    }

    protected function makeNavbar(): string {
        $navItems = "";
        if (Authentification::connectedUser()) {
            $urlProfile = $this->router->urlFor('profile');
            
            $navItems = <<<BLADE
            <a href="${urlProfile}"><h2>Profil</h2></a>
            <a href=""><h2>A propos</h2></a>
            <a href=""><h2>Déconnexion</h2></a>
            <a href="" class="mediaquery"><h2>Profil</h2></a>
            <div id="dropdownNav">
                <a href=""><img src="https://expertphotography.b-cdn.net/wp-content/uploads/2020/08/social-media-profile-photos-3.jpg"></a>

                <div class="dropdown-content">
                    <div class="items">
                        <a href="">Profil</a>
                        <a href="">Paramètres</a>
                        <a href="">Déconnexion</a>
                    </div>
                </div>
            </div>
            BLADE;
        } else {
            $urlConnexion = $this->router->urlFor('login');
            $urlInscription = $this->router->urlFor('register');

            $navItems = <<<BLADE
            <a href=""><h2>A propos</h2></a>
            <a href="${urlConnexion}"><h2 id="login">Connexion</h2></a>
            <a href="${urlInscription}"><h2 id="register">Inscription</h2></a>
            BLADE;
        }

        return <<<BLADE
        <nav>
            <h3>PhotoMedia</h3>
            
            <div class="top">
                <form action="" method="GET" class="search">
                    <select name="search" id="search">
                        <option value="picture" selected>Image</option>
                        <option value="galery">Galerie</option>
                    </select>
                    <div class="search">
                        <input type="text" name="q" placeholder="Rechercher">
                        <button type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>

                <i class="bi bi-plus-lg"></i>
            </div>

            <i class="bi bi-list"></i>

            <div class="list-items">
                <a href=""><h2>Accueil</h2></a>
                ${navItems}
            </div>

        </nav>
        BLADE;
    }
}