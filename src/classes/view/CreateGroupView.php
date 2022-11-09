<?php

namespace atelier\view;

class CreateGroupView extends AppView {
    public function render() : string{
        $html = <<<EOF
            <h2>Créer un groupe</h2>

                <p> Nom de groupe <p>
                <input type="text" id="nameGroup" name="name">
                <p> Nom des membres <p>
                <input type="text" id="nameMembers" name="name">
                
                <br/>
                <br/>
                <div class="Buttons">
                    <input class="CreerButton" type="button" value="Créer">
                    <br/>
                    <input class="AnnulerButton" type="button" value="Annuler">

                </div>


        EOF;

        return $html;
    }
}