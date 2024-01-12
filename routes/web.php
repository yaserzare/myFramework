<?php
use Yaserzare\PocketCore\Request;
use Yaserzare\PocketCore\Router;

Router::get('/articles/create', function () {
    return <<<'HTML'
        <!doctype html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
                     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                                 <meta http-equiv="X-UA-Compatible" content="ie=edge">
                     <title>Pocket Article Create</title>
        </head>
        <body>
          <form action="/articles/create?id=12" method="post">
          <input type="text" name="title" placeholder="enter article title ">
          <button type="submit">create</button>
          
</form>
        </body>
        </html>
HTML;

});

Router::post('/articles/create', function () {

    $request = new Request();
    var_dump($request->all());
    return $request->query('id');


});

Router::get('/articles/{id:\d+}', function ($id) {
    return "articles $id";
});

Router::get('/articles/{id}/edit/{article}', function ($id, $slug) {
    return "articles $id $slug";
});

Router::get('/series', function () {
    return 'series page';
});

Router::get('/about-me', function () {
    return 'about-me page';
});