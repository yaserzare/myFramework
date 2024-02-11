<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Rakit\Validation\ErrorBag;
use Yaserzare\PocketCore\Auth;
use Yaserzare\PocketCore\Controller;

class LoginController extends Controller
{
    public function loginView()
    {
        if(auth()->check())
            return redirect('/user');

        return $this->render('auth.login');
    }

    public function login()
    {
        if(auth()->check())
            return redirect('/user');
        
        $validation = $this->validate(
            request()->all(),
            [
                'email'=>'required|email|max:255|exists:users,email',
                'password'=>'required|min:8'
            ]
        );

        if($validation->fails())
        {
            return redirect('/auth/login');
        }

        $validateData = $validation->getValidatedData();
        $user = (new User)->find($validateData['email'], 'email');

        if(! password_verify($validateData['password'], $user->password))
        {
            $errors = new ErrorBag();
            $errors->add('password', 'check-password', 'اطلاعات وارد شده با یکدیگر مطابقت ندارد.');
            return redirect('/auth/login')
                ->withErrors($errors);
        }

        auth()->login($user);

        return redirect('/user');


    }

    public function logout()
    {
        auth()->logout();
        return redirect('/auth/login');
    }
}