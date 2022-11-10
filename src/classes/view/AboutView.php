<?php

namespace atelier\view;

class AboutView extends AppView {

    public function render():string{
        $html = <<<EOF
        <div class="about">
            <h2 id="cou">A propos</h2>
            <p> JUE Christopher - TAHRI Mehdi - BOULHDIR Khaoula - BARBIER Bradley
            <div>
                <div>
                    <p>Maquette :</p><a href="https://www.figma.com/file/Jw7ouauQ55mZQyznbfPtqZ/Maquette?node-id=0%3A1&t=4paOzKITyvfcUmb9-1" target="_blank">voir Figma</a>
                </div>
                <div>
                    <p>Schéma base de donnée :</p><a href="https://lucid.app/lucidchart/b1388337-d0bd-4b6e-8986-3ee9cd6ed2ae/edit?viewport_loc=274%2C388%2C2226%2C1162%2C0_0&invitationId=inv_2bc33fde-b86e-4f64-88f5-ac9230b9db85" target="_blank">voir LucidChart</a>
                </div>
                <div>
                    <p>Scénario :</p><a href="" target="_blank">voir image</a>
                </div>
                <div>
                    <p>Cas d'utilisation :</p><a href="" target="_blank">voir image</a>
                </div>
                <div>
                    <p>Github :</p><a href="https://github.com/Catif/LP1-CIASIE_Atelier1" target="_blank">voir github</a>
                </div>
            </div>
        <div>
    EOF;

    return $html;
    }
}
