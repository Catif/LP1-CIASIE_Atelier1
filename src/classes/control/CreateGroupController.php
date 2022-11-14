<?php

namespace atelier\control;

use atelier\view as View;
use atelier\modele;

class CreateGroupController extends AbstractController
{
    public function execute(): void
    {
        View\AppView::setAppTitle("Création d'un groupe - PhotoMedia");
        // var_dump($_POST);
        if (isset($_POST['name'], $_POST["member"], $_POST["role"])) {
            $name = filter_input(INPUT_POST, "name");
            $memberEmail = filter_input(INPUT_POST, "member");
            $role = filter_input(INPUT_POST, "role");

            // $userId= $_SESSION['user_profile']['id'];
            $idUser = $_SESSION['user_profile']['id'];
            $user = Modele\User::find($idUser);
            // $userEmail = modele\User::select('email')->where('id', ['user_profile']['id'])->first();
            $group = new Modele\Organization();
            $group->name = $name;
            $group->save();

            $group->users()->attach($user, ['role' => 'owner']);

            $member = modele\User::where('email', $memberEmail)->first();
            if ($member) {
                if ($role == '0')
                    $group->users()->attach($member, ['role' => 'guest']);
                elseif ($role == '1')
                    $group->users()->attach($member, ['role' => 'contributor']);
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
