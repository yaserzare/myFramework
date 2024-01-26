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
