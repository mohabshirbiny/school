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
            return response()->json($this->prepareResponse('success',$success,200)); 
            
        } else{ 
            return response()->json($this->prepareResponse('error',['Unauthorised'],401)); 
            
        } 
    }

    public function getUserProfile() {
        
        $user = Auth::user();

        $data = [
            'user'  => $user,
        ];

        return response()->json($this->prepareResponse('success',$data,200)); 
    }


    public function getUserSubjects() {
        
        $user = Auth::user();

        if (!$user->grade || !$user->grade_id) {
            return response()->json($this->prepareResponse('error','no grade for this user',400)); 
        }

        $subjects = $user->grade->subjects->toArray() ;

        // dd($subjects);
        return response()->json($this->prepareResponse('success',$subjects,200)); 
    }


    public function prepareResponse($status , $data = [] )
    {
        $result = [
            'status'    => $status
        ];

        if ($status == 'success') {
            $result['data'] = $data ;
        } else {
            $result['error'] = $data ;
        }
        
        
        return $result;
        
    }
}
