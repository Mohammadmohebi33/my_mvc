<?php

use App\Core\Route\Route;

Route::get("/a" , function (){
    echo "a";
});

Route::get("/b");
Route::get("/home" , "HomeController@index");

//var_dump(Route::routes());
