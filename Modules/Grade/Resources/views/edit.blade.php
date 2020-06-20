
@extends('layouts.master')

@section('title','Edit Grade')

@section('sub_header','Edit Grade')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add new Grade</div>
                <div class="card-body">
                    <form action="{{ route('admin.grades.update', $grade->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label class="col-md-2">Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="{{ $grade->name }}" required>
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

