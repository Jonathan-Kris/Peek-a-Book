<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function indexRegister(){
        return view("register");
    }

    public function register(){
        $validatedData =  $this->validate(request(), [
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'min:5',
                'required_with:confirm_password'
            ],
            'confirm_password' => ['min:8', 'same:password'],
        ]);

        // Store user to DB
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->role = 'customer';

        $user->save();

        return redirect()->to('/login');
    }

    public function indexLogin(){
        if (Auth::viaRemember()) {
            return redirect()->intended('/home');
        }

        return view("login");
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required','min:5']
        ]);

        // Remember Me
        $minutes = 120;
        if($request->remember_me){
            Cookie::queue('EMAIL_COOKIE', $request->email, $minutes); # time in minute(s)
            Cookie::queue('PASSWORD_COOKIE', $request->password, $minutes);
        }

        // Setting up auth with remember_token : To prevent cookie hijacking
        if(Auth::attempt($credentials, true)){
            $username = DB::table('users')->where('email', $credentials['email'])->first()->name;
            Session::put('auth_session', $credentials);
            Session::put('username_session', $username);
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/home');
    }
}
