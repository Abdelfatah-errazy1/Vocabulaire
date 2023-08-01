<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
class RegisterController extends Controller
{
    public function create()  {
        return view('auth.register');
    }
    public function store(Request $request)  {
        $validate=$request->validate([
            'first_name' =>'required|string',
            'last_name' =>'required|string',
            'email' =>'required|email|string',
            'password'=>'required',
        ]);
        $validate['password']=bcrypt($validate['password']);
        $validate['email_verification_token']=Str::random(60);
        // dd($validate);
        $user=User::create($validate);
      
        // Mail::to($user->email)->send(new EmailVerification($user));
        auth()->login($user);
        event(new Registered($user));
        return redirect(route('vocabulaire.index'));
    }
    public function verify($token)
{
    $user = User::where('email_verification_token', $token)->first();

    if (!$user) {
        abort(404, 'Invalid verification token.');
    }

    $user->email_verified_at = now();
    $user->email_verification_token = null;
    $user->save();

    // Redirect to the desired page after successful verification
    return redirect('/')->with('success', 'Email verified successfully!');
}

}