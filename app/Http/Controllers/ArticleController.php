<?php
namespace App\Http\Controllers;

use Yaserzare\PocketCore\Request;
use Yaserzare\PocketCore\Router;

class ArticleController{

    public function index(Request $request, string $id): string
    {
        var_dump($request->all());
        return "article page ". $id;
    }

    public function create(Request $request)
    {
        var_dump($request->all());
        return $request->query('id');
    }
    public function store(Request $request)
    {
        var_dump($request->all());
        return $request->query('id');
    }
}
