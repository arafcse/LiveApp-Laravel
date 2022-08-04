<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\Models\User;


class SocaliteController extends Controller
{
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $saveUser = User::updateOrCreate([
                    'facebook_id'=> $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' =>$user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())]);
            
            Auth::loginUsingId($saveUser->id);

            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
