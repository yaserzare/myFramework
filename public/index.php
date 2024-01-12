<?php

require_once __DIR__ . "./../vendor/autoload.php";

$app = new \Yaserzare\PocketCore\Application();

$app->router
    ->setRouterFile(__DIR__."/../routes/web.php")
    ->setRouterFile(__DIR__."/../routes/api.php");


$app->run();

