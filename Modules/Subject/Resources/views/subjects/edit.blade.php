
@extends('layouts.master')

@section('title','Edit Subject')

@section('sub_header','Edit Subject')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Subject</div>
                <div class="card-body">
                    <form action="{{ route('admin.subjects.update', $subject->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label class="col-md-2">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $subject->name }}" required>
                            </div>
                        </div>

                        

                        <div class="form-group row" id="grade_div" >
                            <label class="col-md-2">subject Grade</label>
                            <div class="col-md-6">
                                <select name="grade" id="grade" class="form-control select2">
                                    
                                    <option value="0">Choose Grade</option>    
                                    @foreach ($grades as $grade)
                                        <option value="{{$grade->id}}" @if ($subject->grade == $grade->id ) selected @endif>{{$grade->name}}</option>    
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

