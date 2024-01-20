<?php
namespace App\Http\Controllers;

use Yaserzare\PocketCore\Request;
class ArticleController{

    public function index($id): string
    {
        return "article page ". $id;
    }
    public function create()
    {
        $request = new Request();
        var_dump($request->all());
        return $request->query('id');
    }
    public function store()
    {
        $request = new Request();
        var_dump($request->all());
        return $request->query('id');
    }
}
