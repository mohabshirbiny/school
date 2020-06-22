<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Grade\Entities\Grade;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('admin::users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $grades = Grade::all();
        $students = User::where('user_type','student')->whereNull('parent_id')->get();
        return view('admin::users.create',compact('grades','students'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
            
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->password = Hash::make($request->input('password'));
        $user->user_type = $request->input('user_type');
        $user->grade_id = ($request->input('grade') != 0 )? $request->input('grade') : null;
        $user->parent_id = ($request->input('parent_id') != 0 )? $request->input('parent_id') : null;
        
        if ($user->parent_id ) {
            $student = User::find($request->input('parent_id'));
            $student->parent_id = $user->id;
            $student->save();
        }
       

        $user->save();

        return redirect(route('admin.users.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $grades = Grade::all();
        $students = User::where('user_type','student')->whereNull('parent_id')->get();
        return view('admin::users.edit', compact('user','grades','students'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
            
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        
        $user->user_type = $request->input('user_type');
        
        switch ($user->user_type) {
            case 'teacher':
                    $user->grade_id =  null;
                    $user->parent_id = null;
                break;
            case 'student':
                    $user->grade_id = $request->input('grade') ;
                    $user->parent_id =  null;
                break;
            case 'parent':
                    $user->grade_id =  null;
                    $user->parent_id = null;
                    
                    $student = User::find($request->input('parent_id'));
                    $student->parent_id = $user->id;
                    $student->save();
                break;
            
            default:
                # code...
                break;
        }

        $user->save();
        return redirect(route('admin.users.index'));
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
