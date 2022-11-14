<?php

namespace atelier\view;

class CreateGroupView extends AppView
{
    public function render(): string
    {
        $urlActionForm = $this->router->urlFor('create-group');
        $urlRetour = '';

        $html = <<<EOF
        <div id="CreateGroup">

        <h2>Créer un groupe</h2></br>
        <h3 id="info">Informations</h3>

        <form action="${urlActionForm}" method="POST" class="form-CreateGroup">
            <div class="formul">
                <div class="form-nameGroup">
                    <label for="name">Nom de groupe  </label>
                    <input type="text" name="name" id="nameGroup" placeholder="Nom du groupe" required>
                </div>

                <div class="memberRole">

                <div class="form-role">    
                    <label for="role">Role</label>
                    <select name="role" id="role">
                        <option value="0" selected>Visité</option>
                        <option value="1">Contributeur</option>
                    </select>
                 </div>

                <div class="form-nameMember">
                    <label for="name">Email des membres  </label>
                    <input type="email" name="member" id="memberEmail" placeholder="Email du membre" required>
                </div>
                    
                 </div> 
                  
                <div class="buttons">
                    <button class="CreateButton">Créer</button>
                    <button onclick="${urlRetour}" class="CancelButton">Annuler</button>
                </div>
            </div>
        </form>
        </div>
        


        EOF;

        return $html;
    }
}
