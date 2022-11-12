<?php

namespace atelier\view;

class ProfileView extends AppView {
    public function render() : string{
        $html = <<<BLADE
        <h2>Mes galeries</h2>
        <div id="galery-list">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        BLADE;

        return $html;
    }
}