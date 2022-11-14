<?php

namespace atelier\view;

class ModifyGroupView extends AppView
{
    public function render(): string{
        $urlActionForm = $this->router->urlFor('create-group');
        $urlRetour = '';

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
                    <label for="name">Nom des membres  </label>
                    <input type="text" name="member" id="memberName" placeholder="Pseudonyme" required>
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
//  <form action="" method="get" class="form-Group">
//                 <div class="formul">
//                     <div class="form-nameGroup">
//                         <label for="name">Nom de groupe  </label>
                        
//                         <input type="text" name="name" id="nameGroup" required>
//                     </div>
//                     <div class="form-nameMember">
//                         <label for="name">Membres  </label>

//                         <input type="text" name="member" id="memberName" required>
//                     </div>
//                 </div>  
//                 <div class="buttons">
//                     <button class="SaveButton">Sauvgarder</button>
//                     <button class="CancelButton">Annuler</button>
//                 </div>
//             </form>
//         </div>