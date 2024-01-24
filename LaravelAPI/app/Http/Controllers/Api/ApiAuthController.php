<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginTokenRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    //

    public function login(LoginTokenRequest $request)
    {

        $credentials=$request->only('email','password');

        if (Auth::attempt($credentials)){
            $user=User::where('email',$request->email)->first();
            $token=$user->createToken('token')->plainTextToken;
            
            return new LoginResource([
                'token'=>$token,
                'user'=>$user
            ]);

        }else{
            return response()->json([
                'message'=> 'Bad Credentials'
            ],401);
        }

        
    }

    public function register(Request $request)
    {

    }

    public function logout(Request $request)
    {

    }
}
