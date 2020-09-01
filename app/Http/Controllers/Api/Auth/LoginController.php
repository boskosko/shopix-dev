<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function login(Request $request)
   {
        $creds = $request->only(['email', 'password']);

//        $token = auth()->attempt($creds);
       if(!$token = auth()->attempt($creds)){
           return response()->json(['error' => 'Incorrect email/password'], 401);
       }

        return response()->json(['token' => $token]);
   }

   public function refresh()
   {
       try {
           $newToken = auth()->refresh();
       } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
           return response()->json(['error' => $e->getMessage()], 401);
       }

       return response()->json(['token' => $newToken]);

   }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);

    }

}
