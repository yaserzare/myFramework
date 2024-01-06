<?php

require_once __DIR__."/vendor/autoload.php";

$app = new \Yaserzare\PocketCore\Application();
$app->router->get('/articles/{id}/edit/{articles}',function ($id, $slug){
    return "articles $id $slug";
});

$app->router->get('/series',function (){
    return 'series page';
});

$app->router->get('/about-me',function (){
    return 'about-me page';
});

$app->run();

