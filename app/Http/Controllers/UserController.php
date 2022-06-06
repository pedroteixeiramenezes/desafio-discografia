<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
          'email.required' => 'Email é obrigatório',
          'password.required' => 'Password é obrigatório',
        ]
        );
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('album');
        }else{
            return redirect()->back()->with('danger','E-mail ou Senha Inválida');
        }
 
    }
}