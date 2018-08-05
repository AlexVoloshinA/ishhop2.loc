<?php

namespace ishop;


class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    public static function  getRoutes(){
        return  self::$routes;
    }

    public static function getRoute(){
        return self::$route;
    }

    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['prefix'] .self::$route['controller'] . 'Controller';
            if(class_exists($controller)){
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($controllerObject, $action)){
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception('Method {$controller::$action} is not found', 404);
                }
            } else {
                throw new \Exception('Controller {$controller} is not found', 404);
            }
        }else {
            throw new \Exception('Page is not found', 404);
        }
    }

    public static function matchRoute($url){
        foreach (self::$routes as $pattern => $route){
            if(preg_match("#{$pattern}#", $url, $matches)){
                foreach ($matches as $k => $v) {
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;

                return true;
            }
        }
        return false;
    }
    //CamelCase
    public static function upperCamelCase($name){
        $name = ucwords(str_replace('-', ' ', $name));
        $name = str_replace(' ', '', $name);
        return $name;

    }
    //camelCase
    public static function lowerCamelCase($name){
        $name = self::upperCamelCase($name);
        $name = lcfirst($name);
        return $name;
    }

    public static function removeQueryString($url){
        if($url){
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }


}