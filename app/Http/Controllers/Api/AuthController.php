<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Subject\Entities\Result;
use Modules\Subject\Entities\Subject;

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
            'grade'  => $user->grade,
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

    public function getSubjectLessons($subject_id) {
        
        $subject = Subject::find($subject_id);

        if (!$subject) {
            return response()->json($this->prepareResponse('error','no subject',400)); 
        }

        $lessons = $subject->lessons->toArray() ;

        // dd($subjects);
        return response()->json($this->prepareResponse('success',$lessons,200)); 
    }

    public function getSubjectQuestions($subject_id) {
        
        $subject = Subject::find($subject_id);

        if (!$subject) {
            return response()->json($this->prepareResponse('error','no subject',400)); 
        }

        $questions = $subject->questions->toArray() ;

        // dd($subjects);
        return response()->json($this->prepareResponse('success',$questions,200)); 
    }

    public function addSubjectResult(Request $request) {
        
        $this->validate($request, [
            'subject_id'           => 'required',
            'score'           => 'required',
            'status'           => 'required',
        ]);

        $subject = Subject::find($request->subject_id);

        if (!$subject) {
            return response()->json($this->prepareResponse('error','no subject',400)); 
        }
        
        $result = new Result();
        $result->score = $request->input('score');
        $result->status = $request->input('status');
        $result->subject_id = $request->input('subject_id');
        $result->user_id = Auth::user()->id;
        $result->save();

        return response()->json($this->prepareResponse('success',['added successfully'],200)); 
    }

    public function getSubjectResult($subject_id) {
      
        $subject = Subject::find($subject_id);

        if (!$subject) {
            return response()->json($this->prepareResponse('error','no subject',400)); 
        }
        
        $result = Result::where(['user_id' => Auth::user()->id,'subject_id' => $subject_id ])->first();

        return response()->json($this->prepareResponse('success',$result,200)); 
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
