<?php

namespace App\Controllers;

use function App\helper\view;

class HomeController{


    public function index()
    {
        view("home.index");
    }

    public function getPosts()
    {
        #db
        $posts = ["post1" , "post2", "post3"];
        $data = ["posts" => $posts];
        view("home.posts" , $data);
    }
}
