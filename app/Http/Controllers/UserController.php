<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\film;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('auth.userlogin');
    }

    public function indexx(){
        $films = Film::all(); // asumsi Anda memiliki model Film
        return view('user.home')->with('films', $films);
    }

    public function user_proses(Request $request){
        $request->validate([
           'email' => 'required',
           'password' => 'required',
        ]);


        $data = [
           'email' => $request->email,
           'password' => $request->password
        ];

        if(Auth::attempt($data)){
           return redirect()->route('user-home');
        }else{
           return redirect()->route('user-login')->with('failed','Email atau Password salah');
        }


       }

}
