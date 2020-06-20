
@extends('admin::layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Indicator</div>
                <div class="card-body">
                    <form action="{{ route('admin.indicators.store') }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-3">Category</label>
                            <div class="col-md-9">
                                <select name="category_id" class="form-control" required>
                                    <option value=""></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-lg" name="name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3">Short Description</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-lg" name="description">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3">Table / View Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-lg" name="table_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

