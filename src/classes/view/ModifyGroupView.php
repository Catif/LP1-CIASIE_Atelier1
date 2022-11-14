<?php

namespace atelier\view;

class ModifyGroupView extends AppView
{
    public function render(): string
    {
        $urlActionForm = $this->router->urlFor('modify-group', [['id', $this->data->id]]);
        $urlRetour = '';
        $titleGroup = $this->data->name;

        $html = <<<EOF
        <div id="ModifyGroup">

            
            <div class="header">
            <h2>Modifier le groupe</h2>
            <button class="DeleteButton">Supprimer le groupe</button>
            </div>
            <h3 id="info">Informations</h3>

            <form action="${urlActionForm}" method="POST" class="form-Group">
            <div class="formul">
                <div class="form-nameGroup">
                    <label for="name">Nom de groupe  </label>
                    <input type="text" name="name" id="nameGroup" placeholder="Nom du groupe" value="${titleGroup}" required>
                </div>

                <div class="memberRole">

                <div class="form-role">    
                    <label for="role">Role</label>
                    <select name="role" id="role">
                        <option value="0" selected>Invité</option>
                        <option value="1">Contributeur</option>
                    </select>
                 </div>

                <div class="form-nameMember">
                    <label for="name">Email des membres  </label>
                    <input type="email" name="member" id="memberEmail" placeholder="Email du membre" required>
                </div>
                    
                 </div> 
                  
                <div class="buttons">
                    <button class="SaveButton">Sauvgarder</button>
                    <button onclick="${urlRetour}" class="CancelButton">Annuler</button>
                </div>
            </div>
        </form>




           
        EOF;

        return $html;
    }
}
