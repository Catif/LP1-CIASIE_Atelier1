<?php

namespace atelier\view;

class ProfileView extends AppView {
    public function render() : string{
        $html = <<<EOF
            <h2>Mes galeries</h2>
        EOF;

        return $html;
    }
}