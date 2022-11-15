<?php

namespace atelier\control;

use atelier\utils\HttpRequest;

abstract class AbstractController {
    
    /* Attribut pour stocker l'objet HttpRequest */ 
    protected ?HttpRequest $request = null; 
    
    /*
     * Constructeur :
     * 
     * Crée une instance de la classe HttpRequest et la stocke dans
     * l'attribut : $this->request 
     *
     * Penser a l'utiliser pour tout les accès au données
     * GET, POST, la racine (pour les liens html) etc.
     *  
     */
    
    public function __construct(){
        $this->request = new HttpRequest() ;
    }


    /*
     * Méthod execute : a concrétiser dans chaque contrôleur.
     * Elle réalise complètement une fonctionnalité donnée.
     *
     *  Algorithme générique (a adapter suivant la fonctionalité) : 
     *   1 Récupérer les données nécessaires pour la fonctionnalité
     *   2 Exécuter le traitement nécessaire
     *   3 Créer la vue liée à la fonctionnalité et l'affiche 
     */
    
    abstract public function execute() : void; 
      
}


  

