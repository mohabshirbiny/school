@extends('layouts.master')

@section('title','Users')

@section('sub_header','Users')

@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users
                    <a href="{{ route('admin.users.create') }}" class="btn btn-outline-primary float-right">Add new User</a>
                </div>
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->user_type }}</td>
                                    <td><a href="{{ route('admin.users.edit', $user->id) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

