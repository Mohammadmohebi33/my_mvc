<?php


include "vendor/autoload.php";


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

include "App/helper/helper.php";
include "App/Utilities/Url.php";
include "App/Core/Route.php";
include "App/Core/Request.php";
include "App/routes/web.php";

$request = new \App\Core\Request();


