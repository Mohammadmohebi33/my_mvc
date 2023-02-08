<?php

namespace App\Core\Router;

use App\Core\Request;
use App\Core\Route\Route;

class Router
{
    private $request;
    private $routes;
    private $current_route;

    /**
     * @param $request
     * @param $routes
     * @param $current_route
     */
    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request) ?? null;
        var_dump($this->current_route);
    }


    public function findRoute(Request $request)
    {
       // echo $request->getMethod()." ".$request->getUri();
        foreach ($this->routes as $route){
            if (in_array($request->getMethod() ,$route['methods']) && $request->getUri() == $route['uri']){
                return $route;
            }
        }
        return  null;
    }



    public function run()
    {

    }


}