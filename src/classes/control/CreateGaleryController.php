<?php

namespace atelier\control;

use atelier\view as View;

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
                for($i = 0; $i < $numberImages; $i++){
                    $image = $tabImages['name'][$i];
                    $imageSize = $tabImages['size'][$i];
                    $imageTmp = $tabImages['tmp_name'][$i];
                    $imageError = $tabImages['error'][$i];
                    
                    $imageExt = explode('.', $image);
                    $imageExt = strtolower(end($imageExt));
                    
                    $allowed = array('jpg', 'jpeg', 'png', 'gif');
                    
                    if (in_array($imageExt, $allowed)){
                        if ($imageError === 0){
                            if ($imageSize <= 2097152){
                                $imageNameNew = uniqid('picture_', true) . '.' . $imageExt;
                                $userId = $_SESSION['user_profile']['id'];
                                $destination = 'html/img/galeries/' . $userId .'/';
                                if (!is_dir($destination)){
                                    mkdir($destination);
                                }
                                move_uploaded_file($imageTmp, $destination . $imageNameNew);
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
            }
        }


        View\AppView::setAppTitle("Création d'une galerie - PhotoMedia");
        $vue = new View\CreateGaleryView();
        $vue->makePage();
    }
      
}