
@extends('admin::layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new Category</div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-2">Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">Color</label>
                            <div class="col-md-10">
                                <input type="color" class="form-control input-lg" name="color">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2"></label>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

