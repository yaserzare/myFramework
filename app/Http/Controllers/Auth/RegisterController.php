<?php
namespace App\Http\Controllers\Auth;




use Yaserzare\PocketCore\Controller;
use Yaserzare\PocketCore\Request;

class RegisterController extends Controller
{
    public function registerView()
    {
        return $this->render("auth.register");
    }

    public function register()
    {
        dd(request()->all());
    }
}

