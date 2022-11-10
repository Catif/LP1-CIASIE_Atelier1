<?php

namespace atelier\view;

class CreateGaleryView extends AppView {
    public function render() : string{
        $urlActionForm = $this->router->urlFor('create-galery');
        $urlRetour = '';

        // if (isset($_FILES)){
        //     echo("<pre>");
        //     var_dump($_FILES);
        //     var_dump($_POST);
        //     echo("</pre>");
        // }

        
        $html = <<<BLADE
        <article id="CreateGalery">
            <h2>Création d'une galerie</h2>
            
            <form action="${urlActionForm}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" id="title" name="title" placeholder="Mon voyage en Papouasie..." required>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" id="tags" name="tags" placeholder="Voyage, Tourisme, Papouasie" required>
                </div>
                <div class="form-group">
                    <label>Ajouter des images</label>

                    <label for="imagesUpload"><i class="bi bi-upload"></i></label>
                    <input type="file" id="imagesUpload" name="images" multiple="multiple" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="images-list">Fichiers téléversés</label>
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
                                    <button dataModal="valider">Valider</button>
                                    <button dataModal="annuler">Annuler</button>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title">Description</label>
                    <textarea type="text" id="title" name="title" placeholder="Blablabla" required></textarea>
                </div>

                <div class="list-button">
                    <button type="submit">Créer ma galerie</button>
                    <a href="${urlRetour}">Annuler</a>
                </div>
            </form>


            <script src="/html/js/Create-Edit_Galery.js"></script>
        </article>
        
        BLADE;

        return $html;
    }
}