<?php

namespace App\Core\Router;

use App\Core\Request;
use App\Core\Route\Route;
use function App\helper\view;

class Router
{
    private $request;
    private $routes;
    private $current_route;
    const BASE_CONTROLLER = '\App\Controllers\\';

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
        if (is_null($this->current_route)){
            $this->dispatch404();
        }

      $this->dispatch($this->current_route);
    }


    /**
     * @return void
     * when current_route is null or not set
     * this function for 404 and set status code 404
     */
    public function dispatch404()
    {
        header("HTTP/1.0 404 Not Found");
        view('404');
        die();
    }


    private function dispatch($route)
    {
        $action = $route['action'];

        if (is_null($action)){
            return;
        }

        elseif (is_callable($action)){
            call_user_func($action);
        }

        elseif (is_string($action)){
            $action = explode("@" , $action);
            $method = $action[1];
            if (is_array($action)){
                $class_name = self::BASE_CONTROLLER.$action[0];
                if (!class_exists($class_name)){
                    throw new \Exception("class $class_name dont exist");
                }

                $controller = new $class_name();
                if (!method_exists($controller, $method)){
                    throw new \Exception("method $method dont exist in $class_name");
                }
                $controller->{$method}();
            }
        }

    }


}