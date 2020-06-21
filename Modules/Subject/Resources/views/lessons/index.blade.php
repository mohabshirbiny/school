@extends('layouts.master')

@section('title','Lessons')

@section('sub_header','Lessons')

@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lessons
                    <a href="{{ route('admin.lessons.create') }}" class="btn btn-outline-primary float-right">Add new Lesson</a>
                </div>
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{ $lesson->id }}</td>
                                    <td>{{ $lesson->name }}</td>
                                    <td>{{ $lesson->subject->name }}</td>
                                    
                                    <td><a href="{{ route('admin.lessons.edit', $lesson->id) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $lessons->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

