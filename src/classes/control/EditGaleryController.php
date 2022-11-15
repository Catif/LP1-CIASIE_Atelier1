<?php

namespace atelier\control;

use atelier\view as View;
use atelier\router\Router;
use atelier\modele as Modele;

class EditGaleryController extends AbstractController
{
    public function execute(): void {
        $router = new Router();

        if (isset($_GET['id'])) {
            $galery = Modele\Galery::find($_GET['id']);

            if ($galery->users()->withPivot('role')->where('id_user', $_SESSION['user_profile']['id'])->where('role', 'owner')->orWhere('role', 'contributor')->exists()) {

                if ($galery) {
                    if (!empty($_FILES['images']['name'])) {
                        $tabImages = $_FILES['images'];
                        $numberImages = count($tabImages['name']);


                        if ($numberImages > 4) {
                            echo ("Trop d'images");
                        } else if ($numberImages <= 4) {
                            echo ("Nombre d'images correct");

                            $userId = $_SESSION['user_profile']['id'];

                            $destination = 'html/img/users/';
                            if (!is_dir($destination)) {
                                mkdir($destination);
                            }
                            if (!is_dir($destination . $userId . '/')) {
                                mkdir($destination . $userId . '/');
                            }
                            if (!is_dir($destination . $userId . '/' . 'galeries/')) {
                                mkdir($destination . $userId . '/' . 'galeries/');
                            }
                            if (!is_dir($destination . $userId . '/' . 'galeries/' . $galery->id)) {
                                mkdir($destination . $userId . '/' . 'galeries/' . $galery->id);
                            }
                            $destination = $destination . $userId . '/' . 'galeries/' . $galery->id . '/';

                            for ($i = 0; $i < $numberImages; $i++) {
                                $image = $tabImages['name'][$i];
                                $imageSize = $tabImages['size'][$i];
                                $imageTmp = $tabImages['tmp_name'][$i];
                                $imageError = $tabImages['error'][$i];

                                $imageExt = explode('.', $image);
                                $imageExt = strtolower(end($imageExt));

                                $allowed = array('png', 'gif', 'jfif', 'pjpeg', 'jpeg', 'pjp', 'jpg', 'webp');

                                if (in_array($imageExt, $allowed)) {
                                    if ($imageError === 0) {
                                        if ($imageSize <= 2097152) {
                                            $imageNameNew = uniqid('', true) . '.' . $imageExt;

                                            move_uploaded_file($imageTmp, $destination . $imageNameNew);

                                            $picture = new Modele\Picture();
                                            $picture->title = $_POST['title-image-' . $i];
                                            $picture->name_file = $destination . $imageNameNew;
                                            $picture->save();
                                            $galery->pictures()->save($picture);

                                            if (!empty($_POST['tag-image-' . $i])) {
                                                $listTags = explode(',', $_POST['tag-image-' . $i]);
                                                foreach ($listTags as $tag) {
                                                    $tag = trim($tag);
                                                    $tag = strtolower($tag);
                                                    $tag = ucfirst($tag);
                                                    $tag = Modele\Tag::firstOrCreate(['name' => $tag]);
                                                    $picture->tags()->attach($tag);
                                                }
                                            }

                                            echo ($i . "Image téléversée");
                                        } else {
                                            echo ($i . "Image trop lourde");
                                        }
                                    } else {
                                        echo ($i . "Erreur lors du téléversement");
                                    }
                                } else {
                                    echo ($i . "Format d'image non supporté");
                                }
                            }
                        }
                    }
                    if (!empty($_POST)) {
                        if (isset($_POST['actionForm'])) {

                            if ($_POST['actionForm'] == 'editGalery'){
                                $galery->title = $_POST['title'];
                                $galery->description = $_POST['description'];
                                $galery->private = $_POST['visibilite'];
                                $galery->save();
    
                                $galery->tags()->detach();
                                $tabTagsGalerie = explode(',', $_POST['tags']);
                                foreach ($tabTagsGalerie as $tag) {
                                    $tag = trim($tag);
                                    $tag = strtolower($tag);
                                    $tag = ucfirst($tag);
                                    $tag = Modele\Tag::firstOrCreate(['name' => $tag]);
                                    $galery->tags()->attach($tag);
                                }
    
    
                            } else if ($_POST['actionForm'] == 'addMember') {
                                if (isset($_POST['email'], $_POST['typeMember'])) {
                                    if ($_POST['typeMember'] == 'guest' || $_POST['typeMember'] == 'contributor') {
                                        $user = Modele\User::where('email', $_POST['email'])->first();
                                        if ($user) {
                                            if ($user->galeries()->withPivot('role')->where('id_galery', $galery->id)->exists()) {
                                                echo ("L'utilisateur est déjà membre de la galerie");
                                            } else {
                                                $user->galeries()->save($galery, ['role' => $_POST['typeMember']]);
                                                echo ("L'utilisateur a été ajouté à la galerie");
                                            }
                                        }
                                    }
                                }
                            } else if ($_POST['actionForm'] == 'deleteMember') {
                                $user = $galery->users()->where('id_user', $_POST['idMember'])->withPivot('role')->first();
                                if ($user) {
                                    if ($user->pivot->role != 'owner' && $user->id != $_SESSION['user_profile']['id']) {
                                        $galery->users()->detach($user);
                                    }
                                }
                            } else if ($_POST['actionForm'] == 'changeRoleMember') {
                                $user = $galery->users()->where('id', $_POST['idMember'])->withPivot('role')->first();
                                if ($user) {
                                    if ($user->pivot->role != 'owner' && $user->id != $_SESSION['user_profile']['id']) {
                                        echo ('Changement de rôle');
                                        $role = '';
                                        if ($user->pivot->role == 'guest') {
                                            $role = 'contributor';
                                        } else {
                                            $role = 'guest';
                                        }
                                        $galery->users()->updateExistingPivot($user, ['role' => $role]);
                                    }
                                }
                            } else if ($_POST['actionForm'] == 'editOldPicture') {
                                $picture = $galery->pictures()->where('id', $_POST['MODAL-id-image'])->first();
                                if ($picture) {
                                    $picture->title = $_POST['MODAL-title-image'];
                                    $picture->save();
                                    $picture->tags()->detach();
                                    if (!empty($_POST['MODAL-tag-image'])) {
                                        $listTags = explode(',', $_POST['MODAL-tag-image']);
                                        foreach ($listTags as $tag) {
                                            $tag = trim($tag);
                                            $tag = strtolower($tag);
                                            $tag = ucfirst($tag);
                                            $tag = Modele\Tag::firstOrCreate(['name' => $tag]);
                                            $picture->tags()->attach($tag);
                                        }
                                    }
                                }
                            } else if ($_POST['actionForm'] == 'deleteGalery') {
                                $galery->delete();
                            }
                        } else if (isset($_POST['deleteOldPicture'])) {
                            $picture = Modele\Picture::find($_POST['deleteOldPicture']);
                            if ($picture) {
                                if(file_exists($picture->name_file)){
                                    unlink($picture->name_file);
                                    $picture->delete();
                                } 
                            }
                        } 
                    }


                    View\AppView::setAppTitle("Edition d'une galerie - PhotoMedia");

                    $vue = new View\EditGaleryView(['galery' => $galery]);
                    $vue->makePage();
                } else {
                    // Galerie non trouvée

                    $urlHome = $router->urlFor('home');
                    header('Location: ' . $urlHome);
                    die();
                }
            } else {
                // Vous n'avez pas les droits pour accéder à cette page
                $urlHome = $router->urlFor('home');
                header('Location: ' . $urlHome);
                die();
            }
        } else {
            // Aucune galerie sélectionnée

            $urlHome = $router->urlFor('home');
            header('Location: ' . $urlHome);
            die();
        }
    }
}
