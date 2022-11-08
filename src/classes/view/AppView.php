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

                <i>=</i>
            </nav>
        EOT;
    }
}