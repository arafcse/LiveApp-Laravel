<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class APIUserController extends Controller
{
    public function userLogin(Request $request)
    {
        $input = $request->all();
        $validation = Validator::make($input,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validation->fails()){
            return response()->json(['error' => $validation->errors()],422);
        }

        if(Auth::attempt(['email' => $input['email'],'password' => $input['password']])){
            $user = Auth::user();
            $token = $user->createToken('LiveApp')->accessToken;
            return response()->json(['token' => $token]);
        }
    }

    public function userDetails(){
        
        $user = Auth::guard('api')->user();

        return response()->json(['data' => $user]);
    }
}
