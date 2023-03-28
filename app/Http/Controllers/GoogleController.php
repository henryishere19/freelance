<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    
	// Redirect To Google Login
	public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
	
	// After Google redirect handle call back
    public function handleGoogleCallback(){
		try {
			$user 		= Socialite::driver('google')->stateless()->user();
            $finduser 	= User::where('email', $user->email)->first();
			 
			if($finduser){
                Auth::login($finduser);
                return redirect()->route('firstPage');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
      
                Auth::login($newUser);
                return redirect()->route('firstPage');
            }
      
        } catch (Exception $e) {
			echo $e->getMessage(); exit;
        }
    }
}