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
        $galeries = $this->data['galeries']->withPivot('role')->where('role', 'owner')->get();
        $urlCreate = $this->router->urlFor('create-galery');

        $htmlGaleries = <<<BLADE
        <a class="gallery create" href="${urlCreate}">
            <span><i class="bi bi-plus-lg"></i></span>
        </a>
        BLADE;
        foreach($galeries as $gallery){
            $titleGallery = $gallery->title;
            $pictures = $gallery->pictures;
            $numberPictures = count($pictures);
            $srcPicture = $pictures[random_int(0, $numberPictures-1)]->name_file;
            $urlGallery = $this->router->urlFor('view-gallery', [['id',$gallery->id]]);

            $htmlGaleries .= <<<BLADE
            <a class="gallery" href="${urlGallery}">
                <img src='${srcPicture}'>
                <span>${titleGallery}</span>
            </a>
            BLADE;
        }
        $html = <<<BLADE
        <div class="list">
            ${htmlGaleries}
        </div>
        BLADE;
        
        return $html;
    }





    private function createMyGroups(){
        $groups = $this->data['user']->organizations()->withPivot('role')->where('role', 'owner')->get();

        $urlGroup = $this->router->urlFor('create-group');
        $htmlGroup = <<<BLADE
        <a class="group" href="${urlGroup}">
            <span>Ajouter un groupe</span>
        </a>
        BLADE;
        foreach($groups as $group){
            $titleGroup = $group->title;
            $urlGroup = $this->router->urlFor('modify-gallery', [['id',$group->id]]);

            $htmlGroup .= <<<BLADE
            <a class="group" href="${urlGroup}">
                <span>${titleGroup}</span>
            </a>
            BLADE;
        }

        
        $html = <<<BLADE
        <div class="list">
            ${htmlGroup}
        </div>
        BLADE;
        
        return $html;
    }



    private function createSharedGaleries(){
        $galeries = $this->data['galeries']->withPivot('role')->where('role', 'contributor')->orWhere('role', 'guest')->get();

        $htmlGaleries = '';
        foreach($galeries as $gallery){
            $titleGallery = $gallery->title;
            $pictures = $gallery->pictures;
            $numberPictures = count($pictures);
            $srcPicture = $pictures[random_int(0, $numberPictures-1)]->name_file;
            $urlGallery = $this->router->urlFor('view-gallery', [['id',$gallery->id]]);

            $htmlGaleries .= <<<BLADE
            <a class="gallery" href="${urlGallery}">
                <img src='${srcPicture}'>
                <span>${titleGallery}</span>
            </a>
            BLADE;
        }
        if ($htmlGaleries == ''){
            $htmlGaleries = <<<BLADE
            <p>Vous n'avez aucune galerie partagée avec vous.</p>
            BLADE;
        }
        
        $html = <<<BLADE
        <div class="list">
            ${htmlGaleries}
        </div>
        BLADE;
        
        return $html;
    }
}