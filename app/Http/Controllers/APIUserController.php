<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;

class APIUserController extends Controller
{
    public function userRegister(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' =>'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password' 
        ]);

        if($validation->fails())
            {
            return response()->json($validation->errors(), 202);
            }

        $allData = $request->all();
        $allData['password']= bcrypt($allData['password']);

        $user = User::create($allData);

        $resArr = [];
        $resArr['token']=$user->createToken('LiveApp')->accessToken;
        $resArr['name']=$user->name;

        return response()->json($resArr,200);
    }

    public function userLogin(Request $request)
    {
        

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = Auth::user();            
            $resArr = [];
            $resArr['token']=$user->createToken('LiveApp')->accessToken;
            $resArr['name']=$user->name;
            return response()->json($resArr,200);
        }else {
            return response()->json(['error' => 'Unauthorised Access'],203);
        }
    }

    public function userDetails(){

        $user = Auth::guard('api')->user();

        return response()->json(['data' => $user]);
    }

}
