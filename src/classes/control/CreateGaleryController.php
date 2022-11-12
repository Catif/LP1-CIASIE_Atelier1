<?php

namespace atelier\control;

use atelier\view as View;

use atelier\modele as Modele;

class CreateGaleryController extends AbstractController{
    public function execute() : void {
        
        if (!empty($_FILES)){
            echo("<pre>");
            var_dump($_FILES);
            echo('<br>');
            var_dump($_POST);
            echo("</pre>");

            $tabImages = $_FILES['images'];
            $numberImages = count($tabImages['name']);

            
            if ($numberImages == 0){
                echo("Aucune image");
            } else if ($numberImages > 4){
                echo ("Trop d'images");
            } else if ($numberImages <= 4){
                echo("Nombre d'images correct");

                $galerie = new Modele\Galery();
                $galerie->title = $_POST['title'];
                $galerie->description = $_POST['description'];
                $galerie->private = $_POST['visibilite'];
                $galerie->save();

                $tabTagsGalerie = explode(',', $_POST['tags']);
                foreach($tabTagsGalerie as $tag){
                    $tag = trim($tag);
                    $tag = strtolower($tag);
                    $tag = ucfirst($tag);
                    $tag = Modele\Tag::firstOrCreate(['name' => $tag]);
                    $galerie->tags()->attach($tag);
                }

                $userId = $_SESSION['user_profile']['id'];
                                
                $destination = 'html/img/users/' . $userId .'/';
                if (!is_dir($destination)){
                    mkdir($destination);
                }
                if (!is_dir($destination . 'galeries/')){
                    mkdir($destination . 'galeries/');
                }
                if (!is_dir($destination . 'galeries/' . $galerie->id)){
                    mkdir($destination . 'galeries/' . $galerie->id);
                }
                $destination = $destination . 'galeries/' . $galerie->id . '/';

                for($i = 0; $i < $numberImages; $i++){
                    $image = $tabImages['name'][$i];
                    $imageSize = $tabImages['size'][$i];
                    $imageTmp = $tabImages['tmp_name'][$i];
                    $imageError = $tabImages['error'][$i];
                    
                    $imageExt = explode('.', $image);
                    $imageExt = strtolower(end($imageExt));
                    
                    $allowed = array('png', 'gif', 'jfif', 'pjpeg', 'jpeg', 'pjp', 'jpg', 'webp');
                    
                    if (in_array($imageExt, $allowed)){
                        if ($imageError === 0){
                            if ($imageSize <= 2097152){
                                $imageNameNew = uniqid('', true) . '.' . $imageExt;
                                
                                move_uploaded_file($imageTmp, $destination . $imageNameNew);

                                $picture = new Modele\Picture();
                                $picture->title = $_POST['title-image-' . $i];
                                $picture->name_file = $destination . $imageNameNew;
                                $picture->save();
                                $galerie->pictures()->save($picture);
                                
                                if (!empty($_POST['tags-image-' . $i])){
                                    $listTags = explode(',', $_POST['tag-image-' . $i]);
                                    foreach($listTags as $tag){
                                        $tag = trim($tag);
                                        $tag = strtolower($tag);
                                        $tag = ucfirst($tag);
                                        $tag = Modele\Tag::firstOrCreate(['name' => $tag]);
                                        $picture->tags()->attach($tag);
                                    }
                                }

                                echo($i . "Image téléversée");
                                
                            } else {
                                echo($i . "Image trop lourde");
                            }
                        } else {
                            echo($i . "Erreur lors du téléversement");
                        }
                    } else {
                        echo($i . "Format d'image non supporté");
                    }

                    
                }

                $user = Modele\User::find($_SESSION['user_profile']['id']);
                $user->galeries()->attach($galerie);
            }
        }


        View\AppView::setAppTitle("Création d'une galerie - PhotoMedia");
        $vue = new View\CreateGaleryView();
        $vue->makePage();
    }
      
}