<?php

namespace atelier\view;

class PictureView extends AppView {
    public function render() : string{
        $picture = $this->data;
        $srcPicture = $picture->name_file;


        $html = <<<EOT
        <div id="picture-header">
            <img id="pic" src="
        EOT;

        $html .= $srcPicture;

        $html .= <<<EOF
        ${srcPicture}" alt="image">
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
        EOT;

        return $html;
    }
}