
@extends('layouts.master')

@section('title','Create New Subject')

@section('sub_header','Create New Subject')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add new Subject</div>
                <div class="card-body">
                    <form action="{{ route('admin.subjects.store') }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-2">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>

                        

                        <div class="form-group row" id="grade_div"  >
                            <label class="col-md-2">Student Grade</label>
                            <div class="col-md-6">
                                <select name="grade" id="grade" class="form-control select2">
                                    
                                    <option value="0">Choose Grade</option>    
                                    @foreach ($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>    
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                         



                        <div class="form-group row">
                            <label class="col-md-2"></label>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
 

