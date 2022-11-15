<?php

namespace atelier\view;

use atelier\router\Router;
use atelier\utils\HttpRequest;

abstract class AbstractView {

    /* Les incontournables requête et routeur (crée par le constructeur);
     *
     * $request : contient la racine de l'application dans son
     *            attribut root. Il servira a construire les URL
     *            des ressources comme les images, les fichiers CSS
     * $route : permet de construire les URL des liens des routes
     *          de l'application avec sa méthode urlFor.
     */
    protected ?HttpRequest $request = null;
    protected ?Router $router = null;


    /* Configuration des feuilles CSS et du titre du document HTML 
     *
     * $style_sheets : un tableaux contenant un ou plusieurs nom de
     *                 fichiers CSS.
     * $app_title : le titre de l'application (affichée sur
     *              l'onglet du navigateur)
     * 
     * Les deux sont des attributs statiques à initialiser au
     * démarrage de l'application avec les méthodes 
     * addStyleSheet et setAppTitle définies plus bas.
     *
     * Ils seront ajoutés au document HTML dans la méthode render
     * (voir en bas)
     */
    static protected array $style_sheets = []; 
    static protected array $script_files = []; 
    static protected string $app_title = ""; 
    

    /* Les données nécessaires à afficher. Elles sont injectées
     * dans le constructeur.
     *
     * Ces Données sont passée par les contrôleurs lors de la
     * création des vues. Ce sera généralement des objets
     * modèles ou des tableau d'objets modèles.
     */
    protected mixed $data = null; 
    
    
    /* Constructeur 
     * 
     * Paramètres :  
     *
     * - $data : selon la vue, une instance d'un  modèle ou
     *           un tableau d'instances d'un modèle
     * 
     */
    public function __construct( mixed $data=null) {
        $this->request = new HttpRequest();
        $this->router = new Router();
        
        $this->data = $data;
    }

    
    /* Méthode addStyleSheet
     * 
     * Permet d'ajouter une feuille de style à la liste.
     * 
     * Paramètres : 
     *
     * - $css_files : le chemin vers le fichier. Le chemin est
     *                relatif au script principal.
     *
     */
    static public function addStyle(string $css_files): void {
        self::$style_sheets[] = $css_files;
    }

    static public function addScript(string $js_files): void {
        self::$script_files[] = $js_files;
    }

    /* Méthode setAppTitle 
     * 
     * Permet de fixer un nom pour l'application (affiché sur le
     * navigateur) c'est le le titre du document HTML 
     *     
     * Paramètres : 
     *
     * - $title : le titre du document HTML
     * 
     */
    static public function setAppTitle(string $title): void {
        self::$app_title = $title;
    }

    /* Méthode makeBody 
     * 
     * Retourne le contenu HTML de la balise body autrement dit le
     * contenu du document. 
     *
     * Elle prend un sélecteur en paramètre dont la valeur indique
     * quelle vue il faut générer.
     * 
     * Note : cette méthode est à défiuse \iutnc\TweeterView;
     *
     * Retourne : 
     *
     * - Le contenu HTML complet entre les balises <body> </body> 
     *
     */
    abstract protected function makeBody(): string ;




    
    /* Méthode makePage
     * 
     * cette méthode génère le code HTML d'une page complète depuis
     * le <doctype jusqu'au </html>. 
     * 
     * Elle définit les entêtes HTML, le titre de la page et lie les
     * feuilles de style. Le contenu du document est le résultat de la
     * méthode makeBody des sous-classes. 
     *
     * Elle utilise la syntaxe HEREDOC pour définir un patron et
     * écrire la chaîne de caractère de la page entière. Voir la
     * documentation ici:
     *
     * http://php.net/manual/fr/language.types.string.php#language.types.string.syntax.heredoc
     *
     */
    public function makePage() {

        /* Fixer le titre du document */
        
        $title = self::$app_title;

        
        /* Appeler la méthode makeBody de la sous-classe */
        $body = $this->makeBody();
        
        /* Lier les feuilles de style */
        $app_root = $this->request->root;
        
        $styles = '';
        foreach ( self::$style_sheets as $file )
            $styles .= "<link rel=\"stylesheet\" href=\"{$app_root}{$file}\">";


        $scripts = '';
        foreach ( self::$script_files as $file )
            $scripts .= "<script type=\"module\" src=\"{$app_root}{$file}\"></script>";



        /* Construire la structure de la page 
         * 
         *  Noter l'utilisation des variables ${title} ${style} et ${body}
         * 
         */
                
        $html = <<<BLADE
        <!DOCTYPE html>
        <html lang="fr">
                    
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>${title}</title>
                
                <!-- Lib CSS-->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
                
                <!-- Personnal stylesheet -->
                ${styles}

            </head>

            <body>
                
            ${body}


            ${scripts}
            </body>
        </html>
        BLADE;

        /* Affichage de la page 
         *
         * C'est la seule instruction echo dans toute l'application 
         */
        
        echo $html;
    }
    
}

