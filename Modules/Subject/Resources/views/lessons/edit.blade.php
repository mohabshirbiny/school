
@extends('layouts.master')

@section('title','Edit User')

@section('sub_header','Edit User')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add new User</div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label class="col-md-2">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">Phone Number</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="phone_number" value="{{ $user->phone_number }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control input-lg" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control input-lg" name="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">User Type</label>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label><input type="radio" name="user_type" value="teacher"  @if ($user->user_type == 'teacher') checked @endif> Teacher</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="user_type" value="student" @if ($user->user_type == 'student') checked @endif> Student</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="user_type" value="parent" @if ($user->user_type == 'parent') checked @endif> Parent</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row" id="grade_div" style="display: none">
                            <label class="col-md-2">Student Grade</label>
                            <div class="col-md-6">
                                <select name="grade" id="grade" class="form-control select2">
                                    
                                    <option value="0">Choose Grade</option>    
                                    @foreach ($grades as $grade)
                                        <option value="{{$grade->id}}" @if ($user->grade == $grade->id ) selected @endif>{{$grade->name}}</option>    
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="parent_div" style="display: none">
                            <label class="col-md-2">Parent of student</label>
                            <div class="col-md-6">
                                <select name="parent_id" id="parent_id" class="form-control select2">
                                    
                                    <option value="0">Choose Student</option>    
                                    @foreach ($students as $student)
                                        <option value="{{$student->id}}" @if ($user ) selected @endif>{{$student->name}}</option>    
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-md-2"></label>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script> 
        $(document).ready(function(){

            $("input[name=user_type][value='{{$user->user_type}}']").prop("checked",true);
            
            var grade_div = document.getElementById("grade_div");
            var parent_div = document.getElementById("parent_div");
            
            $("input[name=user_type]").click(function(){

                var radioValue = $("input[name='user_type']:checked").val();

                if(radioValue == 'student'){
                    grade_div.style.display = "block";
                    parent_div.style.display = "none";
                }else if(radioValue == 'parent'){
                    grade_div.style.display = "none";
                    parent_div.style.display = "block";
                }else if(radioValue == 'teacher'){
                    grade_div.style.display = "none";
                    parent_div.style.display = "none";
                }

            });

        });
    </script> 
@endsection