<?php

namespace atelier\view;

use Illuminate\Support\Facades\Blade;

class EditGaleryView extends AppView {
    public function render() : string{
        $urlActionForm = $this->router->urlFor('edit-galery');
        $urlRetour = '';

        $galery = $this->data['galery'];
        $title = $galery->title;
        $private = $galery->private;
        $tags = $galery->tags;
        $pictures = $galery->pictures;
        $description = $galery->description;

        if ($private == 1){
            $checkedPublic = '';
            $checkedPrivate = 'selected';
        } else {
            $checkedPublic = 'selected';
            $checkedPrivate = '';
        }

        $stringTag = '';
        foreach ($tags as $tag){
            $stringTag .= $tag->name . ', ';
        }
        $stringTag = substr($stringTag, 0, -2);

        // A faire : 
        // - Faire un nouvelle affichage pour gérer les images
        // - Faire un affichage pour gérer les invitations de membres
        // - Pour se faciliter la tâche, gérer les requêtes par des formulaires différents
        
        $htmlPicture = '<div class="already-upload">';
        foreach ($pictures as $index => $picture){
            echo('<pre>');
            var_dump($picture);
            echo('</pre>');
            $urlPicture = $picture->name_file;
            $namePicture = $picture->title;

            $htmlPicture .= <<<BLADE
            <div class="image-file">
                <img src="${urlPicture}" alt="Image ${index}">
                <p title="${namePicture}">${namePicture}</p>
                <input type="hidden" name="title-image-${index}" value="${namePicture}">
                <input type="hidden" name="tag-image-${index}" value="">

                <div class="image-actions">
                    <i class="bi bi-pencil-square"></i>
                </div>
            </div>
            BLADE;
        }
        $htmlPicture .= '</div>';

        AppView::addScript('html/js/Create-Edit_Galery.js');
        
        $html = <<<BLADE
        <article id="CreateGalery">
            <h2>Edition d'une galerie</h2>
            
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
                            <input type="file" id="imagesUpload" name="images[]" multiple="multiple" accept="image/png, image/gif, image/jpg, image/jpeg, image/webp" required>
                        </div>
                    </div>

                    <div class="group">
                        <div class="form-group">
                            <label for="images-list">Images téléversés</label>
                            <span>(2Mo maximum par image)</span>
                            <div class="images-list">
                                ${htmlPicture}
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
                    <button type="submit">Modifier la galerie</button>
                    <a href="${urlRetour}">Annuler</a>
                </div>
            </form>


        </article>
        
        BLADE;

        return $html;
    }
}