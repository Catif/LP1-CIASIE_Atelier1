<?php

/* pour le chargement automatique des classes d'Eloquent (dans le répertoire vendor) */
require_once 'vendor/autoload.php';

/* Connexion à la BDD  */
$db = new Illuminate\Database\Capsule\Manager();
$db->addConnection(parse_ini_file('conf/db.ini'));   /* configuration avec nos paramètres */
$db->setAsGlobal();            /* rendre la connexion visible dans tout le projet */
$db->bootEloquent();           /* établir la connexion */


/* Ajout de feuille de style */
atelier\view\AppView::addStyle('html/style/css/main.css');

/* Création du router */
$router = new atelier\router\Router();

/* Ajout des routes de l'application */
$router->addRoute('home', 'accueil', 'atelier\control\HomeController');
$router->addRoute('login', 'connexion', 'atelier\control\LoginController');
$router->addRoute('register', 'inscription', 'atelier\control\RegisterController');
$router->addRoute('profile', 'profil', 'atelier\control\ProfileController');


/* Route par défaut */
$router->setDefaultRoute('accueil');

$router->run();