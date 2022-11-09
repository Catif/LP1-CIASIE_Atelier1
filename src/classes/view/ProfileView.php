<?php

namespace atelier\view;

class ProfileView extends AppView {
    public function render() : string{
        $html = <<<BLADE
        <h2>Mes galeries</h2>
        <div id="gallery-list">
            <img>
            <img>
            <img>
            <img>
            <img>
            <img>
            <img>
            <img>
        </div>
        BLADE;

        return $html;
    }
}