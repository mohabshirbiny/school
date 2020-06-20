
@extends('admin::layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary float-right">Add new Category</a>
                </div>
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Color</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->color }}</td>
                                    <td><a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

