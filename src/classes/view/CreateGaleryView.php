<?php

namespace atelier\view;

class CreateGaleryView extends AppView {
    public function render() : string{
        $urlActionForm = $this->router->urlFor('create-galery');
        $urlRetour = '';

        $html = <<<BLADE
        <article id="CreateGalery">
            <h2>Création d'une galerie</h2>
            
            <form action="${urlActionForm}">
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