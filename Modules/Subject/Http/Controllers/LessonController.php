<?php

namespace Modules\Subject\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $subjects = Subject::paginate(20);
        return view('subject::subjects.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('subject::subjects.create',compact('grades'));
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
            'grade' => 'required|not_in:0',
        ]);
            
        $subject = new Subject();
        $subject->name = $request->input('name');
        $subject->grade_id = ($request->input('grade') != 0 )? $request->input('grade') : null;
        $subject->save();

        return redirect(route('admin.subjects.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('subject::subjects.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $grades = Grade::all();

        return view('subject::subjects.edit',compact('subject','grades'));
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

        $subject = Subject::findOrFail($id);
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
