<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    // Function Login
   public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required | string',
            'password' => 'required | min: 4',
        ]);


        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }else{
            return back()->with('loginError', 'Login Failed. Please check your data!!');
        }
   }   

//    function for logout
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
