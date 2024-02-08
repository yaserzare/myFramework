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
        $validation = $this->validate(
            request()->all(),
            [
                'name'=>'required|min:3|max:255',
                'email'=>'required|email|max:255',
                'password'=>'required|min:8',
                'confirm_password'=>'required|same:password',

            ]
        );

        if($validation->fails())
        {
            return redirect('/auth/register');
        }
    }
}


