<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
       
        if(!auth()->attempt($data)) {
            return response(['message'=>'Invalid credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['access_token' => $accessToken]);
    }


    public function show(Request $request){
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $user = auth()->user();
        $user->type_user = $user->type_user;
        return response(['user' => $user]);
    }

    public function logout(Request $request){
        if (auth()->user()) {
            $user = auth()->user()->token();
            $user->revoke();
    
            return response()->json([
              'success' => true,
              'message' => 'Logout successfully'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unable to Logout'
        ]);
    }
}
