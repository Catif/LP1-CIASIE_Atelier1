<?php

namespace atelier\view;

class CreateGroupView extends AppView
{
    public function render(): string
    {
        $html = <<<EOF
        <div id="CreateGroup">

        <h2>Créer un groupe</h2></br>
        <h3 id="info">Informations</h3>

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
                <button class="CreateButton">Créer</button>
                <button class="CancelButton">Annuler</button>
            </div>
        </form>
        
        
        
            
        </div>


        EOF;

        return $html;
    }
}
