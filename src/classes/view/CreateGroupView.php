<?php

namespace atelier\view;

class CreateGroupView extends AppView {
    public function render() : string{
        $html = <<<EOF
            <h2>Créer un groupe</h2></br>
            <h3>Informations</h3>

            <form action="" method="get" class="form-CreateGroup">
                <div class="formul">
                    <div class="form-nameGroup">
                        <label for="name">Nom de groupe  </label>
                        
                        <input type="text" name="name" id="nameGroup" required>
                    </div>
                    <div class="form-nameMember">
                        <label for="name">Nom des membres  </label>

                        <input type="text" name="name" id="memberName" required>
                    </div>
                </div>  
                <div class="buttons">
                    <button class="CreerButton">Créer</button>
                    <button class="AnnulerButton">Annuler</button>
                </div>
            </form>
            
            
            
                


        EOF;

        return $html;
    }
}