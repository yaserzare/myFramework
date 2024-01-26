<?php
namespace App\Http\Controllers;

use Yaserzare\PocketCore\Controller;
use Yaserzare\PocketCore\Request;
use Yaserzare\PocketCore\Router;


class ArticleController extends Controller
{

    public function index(Request $request, string $id): string
    {
        var_dump($request->all());
        return "article page ". $id;
    }

    public function create()
    {
        return $this->render('articles.create', [
            'title' => "this is test",
            'auth' => true
        ]);
    }
    public function store(Request $request)
    {
        $validation = $this->validate($request->all(), [
            'title'=>'requierd|min:10'
        ]);

        if ($validation->fails()) {
            // handling errors
            $errors = $validation->errors();
            echo "<pre>";
            print_r($errors->firstOfAll());
            echo "</pre>";
            exit;
        } else {
            // validation passes
            echo "Success!";
        }
    }
}
