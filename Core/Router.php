<?php
class Router
{
   public $routes = [
      'GET' => [], 
      'POST'=> [],
      'PUT'=> []
   ];
   public function get($uri , $controller)
   {
      $this->routes['GET'][$uri] = $controller;
   }
   public function post($uri , $controller)
   {
      $this->routes['POST'][$uri] = $controller;
   }
   public function put($uri , $controller)
   {
      $this->routes['PUT'][$uri] = $controller;
   }

   public function direct($uri , $method)
   {      
     
      
      if(array_key_exists($uri , $this->routes[$method]))
      {
         return $this->routes[$method][$uri];
      }

      throw new Exception("no Routes defined");
   }
}