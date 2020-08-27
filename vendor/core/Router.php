<?php

class Router {
  
 /* public function __construct() {
    echo "Привет, мир!";
  }*/
  
  protected static $routes = [];
  protected static $route = [];
  
  
  public static function add($regexp, $route = []) {
    self::$routes[$regexp] = $route;
  }
  
  
  public static function getRoutes() {
    return self::$routes;
  }
  
  
  public static function getRoute() {
    return self::$route;
  }
  
  
  public static function matchRoute($url) {
    foreach(self::$routes as $pattern => $route) {
      if(preg_match("#$pattern#i", $url, $matches)) {
        
        foreach($matches as $key => $v) {
          if(is_string($key)) {
            $route[$key] = $v;
          }
        }
        
        self::$route = $route;
        print_arr(self::$route);
        return true;
      }
    }
    return false; 
  }
  
  public static function dispatch($url) {
    if(self::matchRoute($url)) {
        echo "OK";
    } else {
        http_response_code(404);
        include "404.html";  
    }
  }
  
  
  
} // end class Router