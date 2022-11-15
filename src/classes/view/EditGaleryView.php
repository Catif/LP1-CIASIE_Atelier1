<?php

namespace atelier\view;

use Illuminate\Support\Facades\Blade;

class EditGaleryView extends AppView {
    public function render() : string{
        $galery = $this->data['galery'];

        AppView::addScript('html/js/Create-Edit_Galery.js');
        AppView::addScript('html/js/Edit-Galery.js');

        $firstForm = $this->createFormAddNewPicture($galery);
        $secondForm = $this->createFormOldPicture($galery);
        $thirdForm = $this->createFormAddMember($galery);
        $fourthForm = $this->createFormManageMember($galery);
        
        $html = <<<BLADE
        <article id="CreateGalery" class="formatEdit">
            <h2>Edition d'une galery</h2>
            ${firstForm}

            
            <h2>Edition des images</h2>
            ${secondForm}


            <h2>Ajouter un membre</h2>
            ${thirdForm}


            <h2>Modifier les membres</h2>
            ${fourthForm}

            
        </article>
        
        BLADE;

        return $html;
    }









    private function createFormAddNewPicture($galery){
        $urlActionForm = $this->router->urlFor('edit-galery', [['id', $galery->id]]);
        $urlRetour = $this->router->urlFor('view-gallery', [['id', $galery->id]]);
        
        $title = $galery->title;
        $private = $galery->private;
        $description = $galery->description;

        if ($private == 1){
            $checkedPublic = '';
            $checkedPrivate = 'selected';
        } else {
            $checkedPublic = 'selected';
            $checkedPrivate = '';
        }

        $stringTag = '';
        foreach ($galery->tags as $tag){
            $stringTag .= $tag->name . ', ';
        }
        $stringTag = substr($stringTag, 0, -2);
        $html = <<<BLADE
        <form action="${urlActionForm}" method="POST" enctype="multipart/form-data">
            <div>
                <div class="group">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" placeholder="Mon voyage en Papouasie..." value="${title}" required>
                    </div>
                    <div class="form-group">
                        <label for="visibilite">Visibilité</label>
                        <select name="visibilite" id="visibilite">
                            <option value="0" ${checkedPublic}>Public</option>
                            <option value="1" ${checkedPrivate}>Privé</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" id="tags" name="tags" placeholder="Voyage, Tourisme, Papouasie" value="${stringTag}" required>
                    </div>
                    <div class="form-group">
                        <label>Ajouter des images</label>
    
                        <label for="imagesUpload"><i class="bi bi-upload"></i></label>
                        <input type="file" id="imagesUpload" name="images[]" multiple="multiple" accept="image/png, image/gif, image/jpg, image/jpeg, image/webp">
                    </div>
                </div>

                <div class="group">
                    <div class="form-group">
                        <label for="images-list">Images téléversés</label>
                        <span>(2Mo maximum par image)</span>
                        <div class="images-list">
                        </div>
                        
    
                        <div class="modal">
                            <div class="card">
                                <div class="header">
                                    <h3>Edition de l'image n°<span id="numberImage"></span></h3>
                                    <hr>
                                </div>
        
                                
                                <div class="body">
                                    <img src="">
                                    <div class="form">
                                        <div class="form-group">
                                            <label for="MODAL-title-image">Titre de l'image</label>
                                            <input type="text" name="MODAL-title-image" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="MODAL-tag-image">Tag de l'image</label>
                                            <input type="text" name="MODAL-tag-image" value="">
                                        </div>
                                    </div>
    
                                    <div class="footer">
                                        <button type="button" dataModal="valider">Valider</button>
                                        <button type="button" dataModal="annuler">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" placeholder="Blablabla" required>${description}</textarea>
            </div>

            <div class="list-button">
                <button type="submit" name="actionForm" value="editGalery">Modifier la galerie</button>
                <a href="${urlRetour}">Annuler</a>
            </div>
        </form>
        BLADE;

        return $html;
    }











    private function createFormOldPicture($galery){
        $urlActionForm = $this->router->urlFor('edit-galery', [['id', $galery->id]]);

        $pictures = $galery->pictures;


        $htmlPictures = '';
        foreach ($pictures as $picture){
            $idPicture = $picture->id;
            $urlPicture = $picture->name_file;
            $namePicture = $picture->title;

            $stringTagPicture = '';
            foreach ($picture->tags as $tag){
                $stringTagPicture .= $tag->name . ', ';
            }
            $stringTagPicture = substr($stringTagPicture, 0, -2);

            $htmlPictures .= <<<BLADE
            <div class="image-file" id="image-${idPicture}">
                <img src="${urlPicture}" alt="Image ${idPicture}">
                <p title="${namePicture}">${namePicture}</p>
                <input type="hidden" name="tagPicture" value="${stringTagPicture}">

                <div class="image-actions">
                    <i class="bi bi-pencil-square"></i>
                    <button type="submit" name="deleteOldPicture" value="${idPicture}">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
            BLADE;
        }


        $html = <<<BLADE
        <form class="oldPicture" action="${urlActionForm}" method="POST">
            <div class="form-group">
                <div class="images-list">
                    ${htmlPictures}
                </div>
                

                <div class="modal">
                    <div class="card">
                        <div class="header">
                            <h3>Edition de l'image</h3>
                            <hr>
                        </div>

                        
                        <div class="body">
                            <img src="">
                            <div class="form">
                                <div class="form-group">
                                    <label for="MODAL-title-image">Titre de l'image</label>
                                    <input type="text" name="MODAL-title-image" value="">
                                </div>
                                <div class="form-group">
                                    <label for="MODAL-tag-image">Tag de l'image</label>
                                    <input type="text" name="MODAL-tag-image" value="">
                                </div>
                            </div>

                            <div class="footer">
                                <input type="hidden" name="MODAL-id-image" value="">
                                <button type="submit" dataModal="valider" name="actionForm" value="editOldPicture">Valider</button>
                                <button type="button" dataModal="annuler">Annuler</button>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </form>
        BLADE;

        return $html;
    }








    private function createFormAddMember($galery){
        $urlActionForm = $this->router->urlFor('edit-galery', [['id', $galery->id]]);
        $html = <<<BLADE
            <form class="addMember" action="${urlActionForm}" method="POST">
                <div class="form-group">
                    <select name="typeMember">
                        <option value="guest" selected>Invité</option>
                        <option value="contributor">Collaborateur</option>
                    </select>
                    <input type="text" id="addMember" name="email" placeholder="Email">
                </div>
                <div class="list-button">
                    <button type="submit" name="actionForm" value="addMember">Ajouter</button>
                </div>
            </form>
        BLADE;

        return $html;
    }

    
    
    
    
    
    private function createFormManageMember($galery){
        $urlActionForm = $this->router->urlFor('edit-galery', [['id', $galery->id]]);

        $guestHTML = '';
        $contributorHTML = '';
        foreach($galery->users()->withPivot('role')->get() as $member){
            if($member->id != $_SESSION['user_profile']['id'] && $member->pivot->role != 'owner'){
                $idMember = $member->id;
                $usernameMember = $member->username;
                if ($member->pivot->role == 'guest'){
                    $guestHTML .= <<<BLADE
                    <form class="user"  action="${urlActionForm}" method="POST">
                        <p>${usernameMember}</p>
                        <div class="image-actions">
                            <button type="submit" name="actionForm" value="changeRoleMember">
                                <i class="bi bi-arrow-left-right"></i>
                            </button>
                            <button type="submit" name="actionForm" value="deleteMember">
                                <i class="bi bi-x-lg"></i>
                            </button>
                            <input type="hidden" name="idMember" value="${idMember}">
                        </div>
                    </form>
                    BLADE;
                } else if ($member->pivot->role == 'contributor'){
                    $contributorHTML .= <<<BLADE
                    <form class="user" action="${urlActionForm}" method="POST">
                        <p>${usernameMember}</p>
                        <div class="image-actions">
                            <button type="submit" name="actionForm" value="changeRoleMember">
                                <i class="bi bi-arrow-left-right"></i>
                            </button>
                            <button type="submit" name="actionForm" value="deleteMember">
                                <i class="bi bi-x-lg"></i>
                            </button>
                            <input type="hidden" name="idMember" value="${idMember}">
                        </div>
                    </form>
                    BLADE;
                }
            }
        }
        
        $html = <<<BLADE
        <div class="ManageMember" action="${urlActionForm}" method="POST">
            <div id="guests">
                <h3>Invités</h3>
                <div class="box">
                    ${guestHTML}
                </div>
            </div>

            <div id="contributors">
                <h3>Collaborateurs</h3>
                <div class="box">
                    ${contributorHTML}
                </div>
            </div>
        </div>
        BLADE;

        return $html;
    }
}