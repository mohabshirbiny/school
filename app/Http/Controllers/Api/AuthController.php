<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request){ 
        $this->validate($request, [
            'email'           => 'required|max:255|email',
            'password'           => 'required',
        ]);

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            
            $success['token'] =  $user->createToken('AppName')->accessToken; 
            return response()->json(['success' => $success], $this->successStatus); 
        } else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function getUserProfile() {
        
        $user = Auth::user();

        $result = [
            'result'    => 'success',
            'data'      => $user 
        ];
        return response()->json($result, $this->successStatus); 
    }
}
