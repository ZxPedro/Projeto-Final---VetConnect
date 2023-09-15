<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function viewLoginPage()
    {
        return view('auth.login');
    }

    public function postAuthenticate(Request $request)
    {

        $credential = $this->validate($request, [
            'email' => 'required|exists:users',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credential)) {
            return back()->withErrors(['wrong-password' => 'Verifique seus dados']);
        }

        return redirect('/dashboard');
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect('/');
    }
}
