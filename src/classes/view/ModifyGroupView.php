<?php

namespace atelier\view;

class ModifyGroupView extends AppView
{
    public function render(): string
    {
        $html = <<<EOF
        <div id="ModifyGroup">

        
            <div class="header">
            <h2>Modifier le groupe</h2>
            <button class="DeleteButton">Supprimer le groupe</button>
            </div>
            <h3 id="info">Informations</h3>

            <form action="" method="get" class="form-Group">
                <div class="formul">
                    <div class="form-nameGroup">
                        <label for="name">Nom de groupe  </label>
                        
                        <input type="text" name="name" id="nameGroup" required>
                    </div>
                    <div class="form-nameMember">
                        <label for="name">Membres  </label>

                        <input type="text" name="name" id="memberName" required>
                    </div>
                </div>  
                <div class="buttons">
                    <button class="SaveButton">Sauvgarder</button>
                    <button class="CancelButton">Annuler</button>
                </div>
            </form>
        </div>
        EOF;

        return $html;
    }
}
