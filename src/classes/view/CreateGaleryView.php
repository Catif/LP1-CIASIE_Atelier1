<?php

namespace atelier\view;

class CreateGaleryView extends AppView {
    public function render() : string{
        $urlActionForm = $this->router->urlFor('create-galery');
        $urlRetour = $this->router->urlFor('profile');

        

        AppView::addScript('html/js/Create-Edit_Galery.js');
        
        $html = <<<BLADE
        <article id="CreateGalery">
            <h2>Création d'une galerie</h2>
            
            <form action="${urlActionForm}" method="POST" enctype="multipart/form-data">
                <div>
                    <div class="group">
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" id="title" name="title" placeholder="Mon voyage en Papouasie..." required>
                        </div>
                        <div class="form-group">
                            <label for="visibilite">Visibilité</label>
                            <select name="visibilite" id="visibilite">
                                <option value="0" selected>Public</option>
                                <option value="1">Privé</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" id="tags" name="tags" placeholder="Voyage, Tourisme, Papouasie" required>
                        </div>
                        <div class="form-group">
                            <label>Ajouter des images</label>
        
                            <label for="imagesUpload"><i class="bi bi-upload"></i></label>
                            <input type="file" id="imagesUpload" name="images[]" multiple="multiple" accept="image/png, image/gif, image/jpg, image/jpeg, image/webp" required>
                        </div>
                    </div>

                    <div class="group">
                        <div class="form-group">
                            <label for="images-list">Images téléversés</label>
                            <span>(2Mo maximum par image)</span>
                            <div class="images-list">
                                <p>Aucune image pour le moment...</p>
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
                    <textarea type="text" id="description" name="description" placeholder="Blablabla" required></textarea>
                </div>

                <div class="list-button">
                    <button type="submit" disabled>Créer ma galerie</button>
                    <a href="${urlRetour}">Annuler</a>
                </div>
            </form>


        </article>
        
        BLADE;

        return $html;
    }
}