<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authorization extends BaseController
{
    public function signIn()
    {
        return view("sign_in");
    }

    public function authorization(Request $request): RedirectResponse
    {
        $user = User::where("login", $request->input("login"))->first();
        if ($user && Hash::check($request->input("password"), $user->password)) {
            Auth::login($user);
            return redirect()->route('main');
        }
        return back()->withErrors([
            'login' => 'Неправильно введены логин и/или пароль.',
        ]);
    }
}
