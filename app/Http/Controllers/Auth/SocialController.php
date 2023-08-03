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
            return redirect()->route('login')->with('error', 'Facebook authentication failed.');
        }            
        $user=User::query()->where('facebook_id',$userSocialite->user['id'])->first();
        if (!$user){
            $user = User::create([
                'email' => $userSocialite->user['email'],
                'first_name' => $userSocialite->user['given_name'],
                'last_name' => $userSocialite->user['family_name'],
                'facebook_id' => $userSocialite->user['id'],
                'password' => bcrypt(123),   
            ]);
        }
        Auth::login($user);
        return redirect()->route('vocabulaire.index'); 
    }
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
    public function handleGithubCallback()
    {
        try {
            $userSocialite = Socialite::driver('github')->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Github authentication failed.');
        }     
        $user=User::query()->where('github_id',$userSocialite->user['id'])->first();
        if (!$user){

            $user = User::create([
                'email' => $userSocialite->user['email'],
                'first_name' => $userSocialite->user['login'],
                'last_name' => $userSocialite->user['login'],
                'github_id' => $userSocialite->user['id'],
                'password' => bcrypt(123),  
            ]);
        }
        Auth::login($user);
        return redirect()->route('vocabulaire.index'); 
    }
}

      


