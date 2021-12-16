<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UpdateProfileController extends Controller
{
    public function index($id){
        $user = User::Where('id', $id)->first();
        return view('updateProfile',['user'=>$user]);
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'username' => ['required', 'min:5', 'max:30'],
            'password' => [
                'required',
                'min:5',
                'required_with:confirm_password'
            ],
            'confirm-pass' => ['min:5', 'same:password'],
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        Session::put('username_session', $validateData['username']);

        User::where('id', $id)->update(['name'=>$validateData['username'], 'password'=>$validateData['password']]);

        return redirect("/home");
    }
}
