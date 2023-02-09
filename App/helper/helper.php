<?php

namespace App\helper;



function site_url($url): string
{
    return $_ENV['HOST'].$url;
}


function random_element($arr)
{
    shuffle($arr);
    return array_pop($arr);
}

function view($path , $data=[])
{
    extract($data);
    $path = str_replace("." , "/" , $path);
    $view_full_path =  "App/views/$path.php";
    include_once $view_full_path;

}



