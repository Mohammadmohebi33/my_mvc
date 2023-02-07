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



