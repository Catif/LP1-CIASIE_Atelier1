<?php

namespace atelier\view;

class ProfileView extends AppView {
    public function render() : string{
        $user = $this->data['user'];
        

        $myGaleries = $this->createMyGaleries();
        $myGroups = $this->createMyGroups();
        $sharedWithMe = $this->createSharedGaleries();

        $html = <<<BLADE
        <h2>Mes galeries</h2>
        ${myGaleries}

        <h2>Mes groupes</h2>
        ${myGroups}

        <h2>Partagées avec moi</h2>
        ${sharedWithMe}

        BLADE;

        return $html;
    }

    
    
    private function createMyGaleries(){
        $galeries = $this->data['galeries']->get();

        $htmlGaleries = "";
        foreach($galeries as $galery){
            $titleGalery = $galery->title;
            $pictures = $galery->pictures;
            $numberPictures = count($pictures);
            $srcPicture = $pictures[random_int(0, $numberPictures)]->name_file;

            $htmlGaleries .= <<<BLADE
            <div class="galery">
                <img src='${srcPicture}'>
            </div>
            BLADE;
        }
        $html = <<<BLADE
        <div class="list-galery">
            ${htmlGaleries}
        </div>
        BLADE;
        
        return $html;
    }





    private function createMyGroups(){

        $html = <<<BLADE


        BLADE;
        
        return $html;
    }



    private function createSharedGaleries(){

        $html = <<<BLADE
        <div class="galery">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
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