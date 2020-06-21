@extends('layouts.master')

@section('title','Subjects')

@section('sub_header','Subjects')

@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Subjects
                    <a href="{{ route('admin.subjects.create') }}" class="btn btn-outline-primary float-right">Add new Subject</a>
                </div>
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Grade</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    
                                    <td>{{ $subject->id }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->grade->name }}</td>
                                    <td><a href="{{ route('admin.subjects.edit', $subject->id) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $subjects->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

