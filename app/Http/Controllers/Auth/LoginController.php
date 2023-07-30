<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()  {
        return view('auth.login');
    }
    public function store(Request $request)  {
        $validate=$request->validate([
            'email' =>'required|email|string',
            'password'=>'required',
        ]);
        // $validate['password']=($validate['password']);
        if(auth()->attempt($validate)){
            session()->regenerate();
            return redirect('/');
        }
        throw ValidationException::withMessages(['email'=>'email or password is not working']);
        dd($request);
        return view('auth.login');
    }
}
