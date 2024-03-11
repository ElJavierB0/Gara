<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;

class AuthController extends Controller
{
    public function login(Request $request) {

        $loginData= $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        
        if(!auth()->attempt($loginData)) {
            return response([
                'message'=>'Invalid Credentials',
                'message'=>'Error'
            ]);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response([
            'profile'=>auth()->user(),
            'access_token'=>$accessToken,
            'message'=> 'success'
        ]);
    }

    // public function logout() {
    //     auth()->user()->tokens()->delete();

    //     return response(['message'=>'User Logged Out']);
    // }

    public function register(Request $request) {
        $registerData = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:10',
        ]);

        $userController = new UserController();
        $registerData['password'] = bcrypt($registerData['password']);
        $user = $userController->createUser($registerData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'profile' => $user,
            'access_token' => $accessToken,
            'message' => 'success',
        ]);
    }

}