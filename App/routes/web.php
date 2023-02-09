<?php

use App\Core\Route\Route;



Route::get("/home" , "HomeController@index" , [App\Middleware\testMid::class]);
Route::get("/home/posts" , "HomeController@getPosts");

