<?php

use App\Core\Route\Route;


Route::get("/home" , "HomeController@index");
Route::get("/home/posts" , "HomeController@getPosts");

