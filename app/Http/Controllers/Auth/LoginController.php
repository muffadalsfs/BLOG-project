<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();

            return redirect('show');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
