<?php

namespace atelier\view;

class PictureView extends AppView {
    public function render() : string{
        $html = <<<BLADE
            <h2 id="image-title">Image</h2>
            
            
        BLADE;

        return $html;
    }
}