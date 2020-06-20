
@extends('admin::layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('admin.users.index') }}">Users</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('admin.categories.index') }}">Categories</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('admin.indicators.index') }}">Indicators</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

