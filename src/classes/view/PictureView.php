<?php

namespace atelier\view;

class PictureView extends AppView {
    public function render() : string{
        $html = <<<BLADE
        <div id="picture-header">
            <img id="pic" src="https://loremflickr.com/3840/2160/city" alt="image">
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
            <div id="comments-list">
                <div class="comment">
                    <div>
                        <div class="author-pfp"><img src=""></div>
                        <p class="author-name">John_doe13</p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pretium pellentesque ipsum a elementum. In hac habitasse platea dictumst. Duis urna est, pellentesque a lacinia a, porta in quam. Suspendisse at malesuada libero. Morbi tristique semper eros eget ultrices. Vestibulum eget tristique arcu. Curabitur congue erat vitae sodales dictum. Vivamus vestibulum nisl ex, non facilisis purus viverra ac. Vivamus tincidunt porttitor mi, non convallis tortor suscipit in. Ut porta vestibulum elit at bibendum. Pellentesque enim elit, feugiat nec lacus a, molestie volutpat tellus. Phasellus eu est consequat, eleifend lectus sed, congue orci.</p>
                </div>
                <div class="comment">
                    <div>
                        <div class="author-pfp"><img src=""></div>
                        <p class="author-name">Catif19</p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pretium pellentesque ipsum a elementum. In hac habitasse platea dictumst. Duis urna est, pellentesque a lacinia a, porta in quam. Suspendisse at malesuada libero. Morbi tristique semper eros eget ultrices. Vestibulum eget tristique arcu. Curabitur congue erat vitae sodales dictum. Vivamus vestibulum nisl ex, non facilisis purus viverra ac. Vivamus tincidunt porttitor mi, non convallis tortor suscipit in. Ut porta vestibulum elit at bibendum. Pellentesque enim elit, feugiat nec lacus a, molestie volutpat tellus. Phasellus eu est consequat, eleifend lectus sed, congue orci.</p>
                </div>
            </div>
        </div>
        BLADE;

        return $html;
    }
}