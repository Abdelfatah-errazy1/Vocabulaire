<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Models\User;
class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        $userSocialite = Socialite::driver('google')->stateless()->user();
        
        $user=User::query()->where('google_id',$userSocialite->user['id'])->first();
        if (!$user){

            $user = User::create([
               'email' => $userSocialite->user['email'],
               'first_name' => $userSocialite->user['given_name'],
               'last_name' => $userSocialite->user['family_name'],
               'google_id' => $userSocialite->user['id'],
            //    'email_verified_at' => $userSocialite->user['email_verified'],
               'password' => bcrypt(123),
               
           ]);
        }
        Auth::login($user);

        return redirect(route('vocabulaire.index'));
    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $userSocialite = Socialite::driver('facebook')->stateless()->user();
        } catch (\Exception $e) {
            // Handle authentication error, e.g., log the error and redirect back with a message
            return redirect()->route('login')->with('error', 'Facebook authentication failed.');
        }

        
        $user=User::query()->where('facebook_id',$userSocialite->user['id'])->first();
        if (!$user){

            $user = User::create([
               'email' => $userSocialite->user['email'],
               'first_name' => $userSocialite->user['given_name'],
               'last_name' => $userSocialite->user['family_name'],
               'google_id' => $userSocialite->user['id'],
            //    'email_verified_at' => $userSocialite->user['email_verified'],
               'password' => bcrypt(123),
               
           ]);
        }
        Auth::login($user);

        return redirect()->route('vocabulaire.index'); // Replace 'dashboard' with the desired route
    }
}
