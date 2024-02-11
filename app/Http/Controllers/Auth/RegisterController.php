<?php
namespace App\Http\Controllers\Auth;




use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Rakit\Validation\ErrorBag;
use Yaserzare\PocketCore\Auth;
use Yaserzare\PocketCore\Controller;
use Yaserzare\PocketCore\Request;

class RegisterController extends Controller
{
    public function registerView()
    {
        if(auth()->check())
            return redirect('/user');
//      session()->set('name', 'yaser');
//      dd(session()->get('name'));
//      session()->remove('name');
        return $this->render("auth.register");
    }

    public function register()
    {
        if(auth()->check())
            return redirect('/user');

        $validation = $this->validate(
            request()->all(),
            [
                'name'=>'required|min:3|max:255',
                'email'=>'required|email|max:255|unique:users,email',
                'password'=>'required|min:8',
                'confirm_password'=>'required|same:password',

            ]
        );

        if($validation->fails())
        {
            return redirect('/auth/register');
        }

        $userData = $validation->getValidatedData();
        unset($userData['confirm_password']);
        (new User())->create([
            ...$userData,
            'password' => password_hash($userData['password'], PASSWORD_BCRYPT)
        ]);

        return redirect('/auth/login');

    }
}


