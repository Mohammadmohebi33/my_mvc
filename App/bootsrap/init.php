<?php


include "vendor/autoload.php";


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

include "App/helper/helper.php";
include "App/Utilities/Url.php";
include "App/Core/Route.php";


