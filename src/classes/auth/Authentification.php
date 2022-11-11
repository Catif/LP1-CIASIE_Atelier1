<?php

namespace atelier\auth;

use atelier\auth\AbstractAuthentification;
use atelier\modele\User;
use atelier\exceptions\AuthentificationException;

class Authentification extends AbstractAuthentification {



public static function register(string $username,
                                string $password,
                                string $email,
                                $level=self::ACCESS_LEVEL_USER): void {
        $user = User::where('username', '=', $username)->first();
        if ($user){
            throw new AuthentificationException('Nom d\'utilisateur déjà utilisé.');
        } else {
            $hash = self::makePassword($password);
            $userRegister = new User();
            $userRegister->email = $email;
            $userRegister->username = $username;
            $userRegister->password = $hash;
            $userRegister->level = $level;
            $userRegister->save();
        }
    }


       /* La méthode register
        *
        *    Permet la création d'un nouvel utilisateur de l'application
        *
        * Paramètres :
        *
        *    $username : le nom d'utilisateur choisi
        *    $pass : le mot de passe choisi
        *
        * Algorithme :
        *
        *    - Si un utilisateur avec le même nom d'utilisateur existe déjà en BD
        *        - soulever une exception
        *    - Sinon
        *        - créer un nouveau modèle ``User`` avec les valeurs en paramètre
        *           ATTENTION : utiliser self::makePassword (cf. ``AbstractAuthentification``)
        *
        */

public static function login(string $email, string $password): void {

       /* La méthode login
        *
        *     Permet de connecter un utilisateur qui a fourni son nom d'utilisateur
        *     et son mot de passe (depuis un formulaire de connexion)
        *
        * Paramètres :
        *
        *    $username : le nom d'utilisateur
        *    $password : le mot de passe tapé sur le formulaire
        *
        * Algorithme :
        *
        *    - Récupérer l'utilisateur avec l'identifiant $username depuis la BD
        *    - Si aucun de trouvé
        *         - soulever une exception
        *    - Sinon
        *         - réaliser l'authentification et le chargement du profil
        *            ATTENTION : utiliser self::checkPassword (cf. ``AbstractAuthentification``)
        *
        */
        $user = User::where('email', '=', $email)->first();
        if ($user){
            self::checkPassword($password, $user->password, $user->id, $user->level);
        } else {
            throw new AuthentificationException('Utilisateur introuvable');
        }

    }

}
