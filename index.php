<?php

require_once __DIR__."/vendor/autoload.php";

$app = new \Yaserzare\PocketCore\Application();
$app->router->get('/articles',function (){
    return 'articles page';
});
$app->router->get('/series',function (){
    return 'series page';
});


