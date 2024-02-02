<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yaserzare\PocketCore\Controller;

class UserController extends Controller
{
    public function index()
    {

         var_dump((new User())->find('yaser', 'name'));

    }
}