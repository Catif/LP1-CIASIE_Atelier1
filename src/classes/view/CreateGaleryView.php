<?php

namespace atelier\view;

class CreateGaleryView extends AppView {
    public function render() : string{
        $urlActionForm = $this->router->urlFor('create-galery');

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

                    <label for="images"><i class="bi bi-upload"></i></label>
                    <input type="file" id="images" name="images" required>
                </div>

                <div class="form-group">
                    <label for="images-list">Fichiers téléversés</label>
                    <div class="images-list">
                        <div class="image-file">
                            <p>image1.jpg</p>

                            <div class="image-actions">
                                <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </article>
        
        BLADE;

        return $html;
    }
}