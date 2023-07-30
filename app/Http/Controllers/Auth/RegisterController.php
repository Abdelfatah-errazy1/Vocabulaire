<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()  {
        return view('auth.register');
    }
    public function store(Request $request)  {
        $validate=$request->validate([
            'first_name' =>'required|string',
            'last_name' =>'required|string',
            'email' =>'required|email|string|unique:users,email',
            'password'=>'required',
        ]);
        $validate['password']=bcrypt($validate['password']);
        // dd($validate);
        $user=User::create($validate);
        auth()->login($user);
        return redirect(route('vocabulaire.index'));
    }
}