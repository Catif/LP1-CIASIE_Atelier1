<?php

namespace atelier\control;

use atelier\view as View;
use atelier\modele;
use atelier\router\Router;

class ModifyGroupController extends AbstractController
{
    public function execute(): void
    {
        View\AppView::setAppTitle("Modification d'un groupe - PhotoMedia");

        $router = new Router();


        if (isset($_GET['id'])) {
            $group = Modele\Organization::find($_GET['id']);
            if ($group) {
                if ($group->users()->withPivot('role')->where('id_user', $_SESSION['user_profile']['id'])->where('role', 'owner')->exists()) {
                    if (isset($_POST['name'], $_POST["member"], $_POST["role"])) {
                        $name = filter_input(INPUT_POST, "name");
                        $memberEmail = filter_input(INPUT_POST, "member");
                        $role = filter_input(INPUT_POST, "role");

                        $group->where('id', $_GET['id'])->update(['name' => $name]);
                        $group->save();

                        $member = modele\User::where('email', $memberEmail)->first();
                        if ($member) {
                            if ($role == '0')
                                $group->users()->updateExistingPivot($member, ['role' => 'guest']);
                            elseif ($role == '1')
                                $group->users()->updateExistingPivot($member, ['role' => 'contributor']);

                            $urlProfile = $router->urlFor('profile');
                            header('Location: ' . $urlProfile);
                            die();
                        } else {
                            echo ("L'utilisateur n'existe pas !");
                            $vue = new View\ModifyGroupView();
                            $vue->makePage();
                        }
                    } else {
                        // Il y a pas des données entrées

                        $vue = new View\ModifyGroupView($group);
                        $vue->makePage();
                    }
                } else {
                    // Vous n'avez pas les droits pour accéder à cette page

                    $urlHome = $router->urlFor('home');
                    header('Location: ' . $urlHome);
                    die();
                }
            } else {
                // Group non trouvée

                $urlHome = $router->urlFor('home');
                header('Location: ' . $urlHome);
                die();
            }
        }
    }
}
