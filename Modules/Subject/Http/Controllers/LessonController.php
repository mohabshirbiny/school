<?php

namespace Modules\Subject\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Grade\Entities\Grade;
use Modules\Subject\Entities\Lesson;
use Modules\Subject\Entities\Subject;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $lessons = Lesson::paginate(20);
        return view('subject::lessons.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('subject::lessons.create',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'subject_id' => 'required|not_in:0',
        ]);
            
        $lesson = new Lesson();
        $lesson->name = $request->input('name');
        $lesson->desc = $request->input('desc');
        $lesson->subject_id = $request->input('subject_id');
        $lesson->save();

        return redirect(route('admin.subjects.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('subject::lessons.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $subject = Lesson::findOrFail($id);
        $grades = Grade::all();

        return view('subject::lessons.edit',compact('subject','grades'));
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
            'name' => 'required|max:255',
        ]);

        $subject = Lesson::findOrFail($id);
        $subject->name = $request->input('name');
        $subject->grade_id = $request->input('grade');
        $subject->save();
        
        return redirect(route('admin.subjects.index'));
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
