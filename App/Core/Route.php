<?php

class Route{

    private $routes;

    /**
     * @param $routes
     */
    public function __construct()
    {
        $this->routes = [
            "/a" => "a.php" ,
            "/b" => "b.php"
        ];
    }


    public function run()
    {
        $current_url = \App\Utilities\Url::current_route();
        foreach ($this->routes as $key => $value){
            if ($current_url == $key){
                $this->includeAndDie("App/views/".$value);
            }
        }
        $this->e404();
    }


    private function includeAndDie($viewPath)
    {
        include $viewPath;
        die();
    }


    private function e404()
    {
        header("HTTP/1.0 404 Not Found");
        $this->includeAndDie("App/views/404.php");
    }


}
