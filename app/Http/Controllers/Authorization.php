<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Authorization extends BaseController
{
    public function signIn()
    {
        return view("sign_in");
    }

    public function authorization(Request $request)
    {

    }
}
