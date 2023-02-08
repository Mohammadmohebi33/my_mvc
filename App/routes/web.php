<?php

use App\Core\Route\Route;

Route::get("/a" , function (){
    echo "b";
});
Route::get("/b" , function (){
    echo "a";
});
Route::post("/a" , function (){
    echo "b";
});

var_dump(Route::routes());
