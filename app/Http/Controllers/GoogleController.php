<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try{
            $user = Socialite::driver('google')->user();
        
            $finduser = User::where('email', $user->getEmail())->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('home');
            } else {
                $newUser = User::create([
                    'google_id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make(Str::random(24)),
                ]);                

                $newUser->sendEmailVerificationNotification();
                
                Auth::login($newUser);
                return redirect()->intended('home');
            }
            
        }
        catch(\Throwable $th){
            return redirect()->route('login')->with('error', 'There was an error trying to login with Google');
        }
    }
}
