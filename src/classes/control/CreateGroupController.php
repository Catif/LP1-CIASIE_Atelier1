<?php

namespace atelier\control;

use atelier\view as View;
use atelier\modele;

class CreateGroupController extends AbstractController
{
    public function execute(): void
    {
        View\AppView::setAppTitle("Création d'un groupe - PhotoMedia");
        var_dump($_POST);
        if (isset($_POST['name'], $_POST["member"], $_POST["role"])) {
            $name = filter_input(INPUT_POST, "name");
            $member = filter_input(INPUT_POST, "member");
            $role = filter_input(INPUT_POST, "role");
            $userEmail = $_SESSION['user_profile']['email'];

            $user = modele\User::where('email', $member)->first();
            if ($user) {
                $group = new Modele\Organization();
                $group->name = $name;
                $group->users()->attach($userEmail, ['role' => 'owner']);
                $group->save();

                if ($role == '0')
                    $group->users()->attach($user, ['role' => 'guest']);
                elseif ($role == '1')
                    $group->users()->attach($user, ['role' => 'contributeur']);
            } else {
                echo ("L'utilisateur n'existe pas !");
                $vue = new View\CreateGroupView();
                $vue->makePage();
            }
        }

        $vue = new View\CreateGroupView();
        $vue->makePage();
    }
}
