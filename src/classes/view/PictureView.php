<?php

namespace atelier\view;
use atelier\modele as Modele;

class PictureView extends AppView {
    public function render() : string{
        $picture = Modele\Picture::find($_GET['id']);
        $srcPicture = $picture->name_file;

        $titlePicture = $picture->title;
        $tagsPicture = $picture->tags;

        $htmlTags = '';
        foreach ($tagsPicture as $tag){
            $htmlTags .= "{$tag->name} ";
        }

        $datePicture = $picture->created_at;
        $datePicture = date('d/m/Y', strtotime($datePicture));
        
        $galerie = $picture->galerie()->first();
        $author = $galerie->users()->withPivot('role')->where('role', 'owner')->first()->username;

        
        $urlGalerie = $this->router->urlFor('view-gallery', [['id', $galerie->id]]);

        $size = [0, 0];
        if (is_file($srcPicture)){
            $size = getimagesize($srcPicture);
        }

        $html = <<<BLADE
        <a href="${urlGalerie}">Revenir à la galerie</a>
        <div id="picture-header">
            <img id="pic" src="${srcPicture}" alt="image">
            <div id="picture-infos">
                <div>
                    <h2>Titre</h2>
                    <p>${titlePicture}</p>
                </div>
                <div>
                    <h2>Auteur</h2>
                    <p>${author}</p>
                </div>
                <div>
                    <h2>Date d'ajout</h2>
                    <p>${datePicture}</p>
                </div>
                <div>
                    <h2>Tags</h2>
                    <p>${htmlTags}</p>
                </div>
                <div>
                    <h2>Données techniques</h2>
                    <p>${size[0]} x ${size[1]}, JPEG, Paris</p>
                </div>
            </div>
        </div>

        <div id="comments">
            <div id="comments-header">
                <h2>Commentaires</h2>
                <a id="addCommentBtn">Ajouter un commentaire</a>
            </div>
            <div id="comments-list">
                <div id="newComment">
                    <form method="POST">
                        <div>
                            <label>Message</label>
                            <textarea name="message" autofocus maxlength="65000" required></textarea>
                        </div>
                        <button type="submit">Envoyer</button>
                    </form>
                </div>
                <div class="comment">
                    <div>
                        <div class="author-pfp"><img src=""></div>
                        <p class="author-name">John_doe13</p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pretium pellentesque ipsum a elementum.</p>
                </div>
                <div class="comment">
                    <div>
                        <div class="author-pfp"><img src=""></div>
                        <p class="author-name">Catif_19</p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pretium pellentesque ipsum a elementum. In hac habitasse platea dictumst. Duis urna est, pellentesque a lacinia a, porta in quam. Suspendisse at malesuada libero. Morbi tristique semper eros eget ultrices. Vestibulum eget tristique arcu.</p>
                </div>
            </div>
        </div>
        BLADE;

        return $html;
    }
}