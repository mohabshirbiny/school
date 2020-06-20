@extends('dashboard::layouts.master')

@section('title')
    <title>لوحة إحصائيات</title>
@endsection
@section('content')

    <div class="page-bar shadow-mo">
        <form action="{{ route('dashboard.indicators.find') }}" method="post">
            @csrf
            <div class="form-group row">
                <label class="col-md-2">الرجاء إختيار المؤشر</label>
                <div class="col-md-9">
                    <select name="indicator_id" class="form-control">
                        <option value="0">عرض كافة المؤشرات</option>
                        @foreach($indicators as $ind)
                            <option value="{{ $ind->id }}">{{ $ind->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">إنتقال</button>
                </div>

            </div>
        </form>
    </div>

    <div class="page-bar shadow-mo">
        <h2>{{ $indicator->name }}</h2>
        <h4>مجموعة: {{ $indicator->category->name }}</h4>
        <p>{{ $indicator->description }}</p>
        <hr>

        <table class="table">
            <thead>
            <tr>
            @foreach($indicator->views as $columns)
                @foreach($columns as $key => $column)
                    <th>{{ ucwords(str_replace('_', ' ', $key)) }}</th>
                @endforeach
                @if (!$loop->index) @break @endif
            @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($indicator->views as $columns)
                <tr>
                    @foreach($columns as $column)
                        <td>{{ $column }}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>




    </div>



@endsection

