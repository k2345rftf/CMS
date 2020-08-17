<?php

require_once __DIR__."/../vendor/autoload.php";

use Engine\CMS;
use Engine\DI\DI;
try{
    //Dependency Injection
    $di = new DI();

    $services = require __DIR__.'/Config/Service.php';
    // Init Services
    foreach ($services as $service){
        $provider = new $service($di);
        $provider->init();
    }
    $cms = new CMS($di);
    $cms->run();
}catch (\ErrorException $e){
    echo($e);
}