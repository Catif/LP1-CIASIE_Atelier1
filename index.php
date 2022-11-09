<?php

/* pour le chargement automatique des classes d'Eloquent (dans le répertoire vendor) */
require_once 'vendor/autoload.php';

/* Connexion à la BDD  */
$db = new Illuminate\Database\Capsule\Manager();
$db->addConnection(parse_ini_file('conf/config.ini'));   /* configuration avec nos paramètres */
$db->setAsGlobal();            /* rendre la connexion visible dans tout le projet */
$db->bootEloquent();           /* établir la connexion */


/* Ajout de feuille de style */
atelier\view\AppView::addStyle('html/style/css/main.css');

/* Création du router */
$router = new atelier\router\Router();

/* Ajout des routes de l'application */


$router->addRoute('home', 'home', 'atelier\control\HomeController');
$router->addRoute('creerGroup', 'CreerGroup', 'atelier\control\CreerGroupController');
$router->addRoute('profile', 'profile', 'atelier\control\ProfileController');
$router->addRoute('createGroup', 'createGroup', 'atelier\control\CreateGroupController');



/* Route par défaut */
$router->setDefaultRoute('home');

$router->run();
