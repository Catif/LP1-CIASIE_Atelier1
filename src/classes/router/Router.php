<?php

namespace atelier\router;

use atelier\auth\AbstractAuthentification;

class Router extends AbstractRouter {

    public function addRoute(string $name, string $action, string $ctrl, string $level = AbstractAuthentification::ACCESS_LEVEL_USER): void{
        self::$routes[$action] = [$ctrl, $level];
        self::$aliases[$name] = $action;
    }

    public function setDefaultRoute(string $action):void{
        self::$aliases['default'] = $action;
    }
    
    public function run() : void{
        if(isset($this->request->get['action'])){
            $route = self::$routes[$this->request->get['action']];
            if ($route){
                if (AbstractAuthentification::checkAccessRight($route[1])){
                    $ctrl = new $route[0]();
                    $ctrl->execute();
                } else {
                    header("Location: " . $this->urlFor('home'));
                }
            } else {
                self::executeRoute('default');
            }
        } else {
            self::executeRoute('default');
        }
    }

    public static function executeRoute(string $name){
        $class = self::$routes[self::$aliases[$name]][0];
        $ctrl = new $class();
        $ctrl->execute();
    } 

    public function urlFor(string $name, array $params=[]): string {
        $url = $this->request->script_name;
        $url .= "?action=" . self::$aliases[$name];
        if (!empty($params)){
            foreach($params as $param){
                $url .= "&amp;{$param[0]}={$param[1]}";
            }
        }
        return $url;
    }  
}
