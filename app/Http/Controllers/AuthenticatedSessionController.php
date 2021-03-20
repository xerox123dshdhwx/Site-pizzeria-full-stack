<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required'
        ]);


        $credentials = ['login' => $request->input('login'),
                        'password' => $request->input('mdp')];


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $request->session()->flash('etat','login successful');

            return redirect()->intended('home');
        }


        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
