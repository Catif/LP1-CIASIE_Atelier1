<?php

namespace atelier\view;

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

        return <<<EOT
            <header>
                ${navbar}
            </header>


            <section class="theme-backcolor2">
                <article class="theme-backcolor2">
                    ${article}
                </article>

            </section>
        EOT;
    }

    protected function makeNavbar(): string {
        return <<<EOT
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
                    <!-- <a href=""><h2>Profil</h2></a> -->
                    <a href=""><h2>A propos</h2></a>
                    <!-- <a href=""><h2 id="login">Connexion</h2></a> -->
                    <!-- <a href=""><h2 id="register">Inscription</h2></a> -->
                    <!-- <a href=""><h2>Déconnexion</h2></a> -->
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
                </div>

            </nav>
        EOT;
    }
}