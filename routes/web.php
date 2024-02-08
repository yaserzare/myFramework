<?php

use App\Http\Controllers\Auth\RegisterController;
use Yaserzare\PocketCore\Request;
use Yaserzare\PocketCore\Router;
use App\Http\Controllers\ArticleController;

Router::get('/auth/register', [RegisterController::class, 'registerView']);
Router::post('/auth/register', [RegisterController::class, 'register']);

Router::get('/articles/create', [ArticleController::class, 'create']);

Router::post('/articles/store', [ArticleController::class, 'store']);

Router::get('/articles/{id}', [ArticleController::class, 'index']);

Router::get('/articles/{id}/edit/{article}', function ($id, $slug) {
    return "articles $id $slug";
});

Router::get('/articles/{id:\d+}', function ($id) {
    return "articles $id";
});

//Router::get('/about', 'about');
Router::view('/about', 'about');

Router::get('/users', [\App\Http\Controllers\UserController::class, 'index']);