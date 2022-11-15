<?php

namespace atelier\router;

use \atelier\utils\HttpRequest;

abstract class AbstractRouter {

    /*   Une instance de HttpRequest */
    
    protected ?HttpRequest $request = null ;
    
    /*
     * Attribut statique qui stocke la liste des routes possibles
     * de l'application. Chaque route réalise une seule fonctionnalité. 
     *  
     * - Une route est représentée par le le couple
     *             (action, classe contrôler)
     *
     * - Chaque route est stockée dans le tableau self::$routes
     *   sous la clé action et a pour valeur le nom de la classe
     *   sous forme d'une chaîne de caractère
     * 
     */
    
    static protected array $routes = [];

    /* 
     * Attribut statique qui stocke les alias des routes. Un alias est
     * un nom unique qui permet d'identifier les routes.
     * 
     * - Les clés du tableau sont les alias et les valeur sont les
     *   actions qui déclenchent la route. 
     *
     */

    static protected array $aliases = [];
    
    /*
     * Un constructeur 
     * 
     * Crée une instance de la classe HttpRequest et la stocke dans
     * l'attribut : $this->request 
     *
     * Penser a l'utiliser pour tout les accès au données
     * GET, POST, la racine (pour les liens html) etc.
     * 
     */ 

    public function __construct(){
        $this->request = new HttpRequest();
    }


    /* 
     * Méthode addRoute : ajoute une route a la liste des routes 
     *
     * Paramètres :
     * 
     * - $name  : un nom pour la route
     * - $action: la valeur du prametre action du query string
     * - $ctrl  : le nom de la classe du Contrôleur 
     * 
     * Algorithme :
     *
     * - Ajouter $ctrl au tableau self::$routes sous la clé $action
     * - Ajouter $action au tableau self::$aliases sous la clé $name
     *
     */

    abstract public function addRoute(string $name,
                                      string $action,
                                      string $ctrl,
                                      string $level): void;


    /*
     * Méthode setDefaultRoute : fixe la route par défault
     * 
     * Paramètres :
     * 
     * - $action : la valeur du prametre action du query string
     *             pour la route par default 
     *
     * Algorthme:
     *  
     * - ajoute $action au tableau self::$aliases sous la clé 'default'
     *
     */

    abstract public function setDefaultRoute(string $action):void;




    /*
     * Méthode run : exécuter une route en fonction de la requête 
     *    (l'action est récupérée depuis l'attribut $this->request)
     *
     * Algorithme :
     * 
     * - si le query string ne contient pas le paramètre action
     *    - exécuter la route par défaut
     * - sinon
     *    - Récupérer la valeur de action
     *    - si une route existe dans $self::routes sous cette cette clé.
     *        - exécuter cette route
     *    - sinon exécuter la route par defaut
     * 
     * Note : exécuter une route revient a instancier le contrôleur
     *        de la route et exécuter sa méthode execute
     */
    
    abstract public function run() : void;




    /*
     * Méthode urlFor : retourne l'URL d'une route depuis son alias
     * cette méthode est utile pour écrire les lien HTML et les action
     * des formulaire. Elle permet de générer la valeur href ppour les
     * balise <a href="...">lien</a> 
     * 
     * Paramètres :
     * 
     * - $name : alias de la route (clé du tableau self::$aliases) 
     * - $params (optionnel) : la liste des paramètres si l'URL
     *      prend des paramètres dans le querry string. Chaque paramètre
     *      est représenté sous la forme d'un tableau avec 2 entrées :
     *      le nom du paramètre et sa valeur  
     *
     * Algorthme:
     *
     * - Déduire l'action de la route demandée (dans self::$aliases)
     * - Construire depuis le nom du script et l'action 
     *   l'URL relatif (ex: "/le/chemin/../main.php?action=...")
     * - Si $params est fournit
     *      - Ajouter les paramètres du query string à l'URL complète
     *         (ex: "/le/chemin/../main.php?action=...&...=...&...=...")
     * - retourner l'URL
     *
     */
    
    abstract public function urlFor(string $name,
                                    array $params=[]): string;

  
}
