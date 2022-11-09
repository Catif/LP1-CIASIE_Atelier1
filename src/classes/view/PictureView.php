<?php

namespace atelier\view;

class PictureView extends AppView {
    public function render() : string{
        $html = <<<BLADE
        <div id="pictureView-container">
            <div id="picture-header">
                <img id="picture" src="https://loremflickr.com/cache/resized/65535_52258697258_7a151c8572_h_1280_720_nofilter.jpg">
                <div id="picture-infos">
                    <div>
                        <h2>Titre</h2>
                        <p>Photo abstraite</p>
                    </div>
                    <div>
                        <h2>Auteur</h2>
                        <p>John Doe</p>
                    </div>
                    <div>
                        <h2>Date d'ajout</h2>
                        <p>09/11/2022</p>
                    </div>
                    <div>
                        <h2>Tags</h2>
                        <p>Art Abstrait Photographie</p>
                    </div>
                    <div>
                        <h2>Données techniques</h2>
                        <p>1280 x 720, JPEG, Paris</p>
                    </div>
                </div>
            </div>
    
            <div id="comments">
                <div id="comments-header">
                    <h2>Commentaires</h2>
                    <a>Ajouter un commentaire</a>
                </div>
            </div>
        </div>

        BLADE;

        return $html;
    }
}