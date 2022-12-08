<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

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


//    Function Register
   public function register(Request $request) {
        //Validation data
        $request->validate([
            'username' => ['required', 'string', 'max: 20'],
            'password' => ['required', password::min(4)],
        ]);

        // ddd($request);

        // store data using user model
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended('/');
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
