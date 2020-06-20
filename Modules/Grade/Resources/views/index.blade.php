@extends('layouts.master')

@section('title','Grades')

@section('sub_header','Grades')

@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Grades
                    <a href="{{ route('admin.grades.create') }}" class="btn btn-outline-primary float-right">Add new Grade</a>
                </div>
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($grades as $grade)
                                <tr>
                                    <td>{{ $grade->id }}</td>
                                    <td>{{ $grade->name }}</td>
                                    <td><a href="{{ route('admin.grades.edit', $grade->id) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $grades->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

