<?php

namespace App\Http\Controllers;

use Yaserzare\PocketCore\Auth;
use Yaserzare\PocketCore\Controller;

class PanelController extends Controller
{
    public function index()
    {
        if(! auth()->check())
            return redirect('/auth/login');


        return $this->render('panel.index');
    }
}