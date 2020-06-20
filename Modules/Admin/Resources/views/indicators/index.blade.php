
@extends('admin::layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Indicators
                    <a href="{{ route('admin.indicators.create') }}" class="btn btn-outline-primary float-right">Add new Indicator</a>
                </div>
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Table Name</th>
                                <th>Group</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($indicators as $indicator)
                                <tr>
                                    <td>{{ $indicator->id }}</td>
                                    <td>{{ $indicator->name }}</td>
                                    <td>{{ $indicator->table_name }}</td>
                                    <td><a href="{{ route('admin.indicators.edit', $indicator->id) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $indicators->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

