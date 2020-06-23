<?php

namespace Modules\Subject\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Subject\Entities\Question;
use Modules\Subject\Entities\Subject;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $questions = Question::paginate(20);
        return view('subject::questions.index',compact('questions'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('subject::questions.create',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'question' => 'required|max:255',
            'subject_id' => 'required|not_in:0',
            'answers' => 'required',
            'correct_answer' => 'required',
        ]);
            
        $question = new Question();
        $question->question = $request->input('question');
        $question->answers = json_encode(explode("\n", str_replace("\r", "", $request->answers)));
        $question->subject_id = $request->input('subject_id');
        $question->correct_answer = $request->input('correct_answer');
        $question->save();

        return redirect(route('admin.questions.index'));

    }



    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $subjects = Subject::all();
        return view('subject::questions.edit',compact('question','subjects'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'question' => 'required|max:255',
            'subject_id' => 'required|not_in:0',
            'answers' => 'required',
            'correct_answer' => 'required',
        ]);
            
        
        $question = Question::findOrFail($id);
        $question->question = $request->input('question');
        $question->answers = json_encode(explode("\n", str_replace("\r", "", $request->answers)));
        $question->subject_id = $request->input('subject_id');
        $question->correct_answer = $request->input('correct_answer');
        $question->save();

        return redirect(route('admin.questions.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
