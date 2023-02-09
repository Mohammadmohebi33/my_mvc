<?php

namespace App\Middleware;

use App\Middleware\Contract\MiddlewareInterface;

class testMid implements MiddlewareInterface
{

    public function handel()
    {
          global $request;
          if($request->getIp() == "127.0.0.1"){
              echo "<h1>you are blocked ny admin</h1>";
          }
          die();
    }
}