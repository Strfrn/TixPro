<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\film;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
   public function index(){
    return view('admin.home');
   }
}
