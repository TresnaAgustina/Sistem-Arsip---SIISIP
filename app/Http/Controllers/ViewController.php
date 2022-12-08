<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    // root page
    public function index(){
        if(Auth::check()){
            return view('layouts.Index');
        }else{
            return view('auth.Login');
        }
    }

    // login page
    public function login(){
        return view('auth.Login');
    }

    // view register
    public function register(){
        return view('auth.Register');
    }
}
