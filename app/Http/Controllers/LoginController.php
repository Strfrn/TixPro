<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('home');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('failed', 'Akun tidak terdaftar sebagai admin');
            }
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password salah');
        }
    }
}
