<?php



include "vendor/autoload.php";
include "App/Core/Request.php";




$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

$request = new \App\Core\Request();
include "App/helper/helper.php";
include "App/Utilities/Url.php";
include "App/Core/Route.php";
include "App/routes/web.php";
include "App/Core/Router.php";
include "App/Controllers/HomeController.php";
include "App/Middleware/Contract/MiddlewareInterface.php";
include "App/Middleware/testMid.php";





