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

                <i class="bi bi-list"></i>
                
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

                <div class="list-items">
                    <a href=""><h2>Accueil</h2></a>
                    <a href=""><h2>A propos</h2></a>
                    <a href=""><h2>Connexion</h2></a>
                    <a href=""><h2>Inscription</h2></a>
                </div>
            </nav>
        EOT;
    }
}