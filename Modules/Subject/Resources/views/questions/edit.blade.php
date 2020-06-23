
@extends('layouts.master')

@section('title','Edit Question')

@section('sub_header','Edit Question')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Question</div>
                <div class="card-body">
                    <form action="{{ route('admin.questions.update', $question->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group row" id="grade_div" >
                            <label class="col-md-2">Subject</label>
                            <div class="col-md-6">
                                <select name="subject_id" id="subject_id" class="form-control select2">
                                    
                                    <option value="0">Choose subject</option>    
                                    @foreach ($subjects as $subject)
                                        <option value="{{$subject->id}}" @if ($question->subject_id == $subject->id ) selected @endif>{{$subject->name}}</option>    
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">Question</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="question" value="{{$question->question}}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2">Answers</label>
                            <div class="col-md-6">
                                <textarea name="answers" id="" cols="55" rows="5">{{ implode(PHP_EOL ,$question->answers) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">Correct Answer</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="correct_answer" value="{{$question->correct_answer}}" required>
                            </div>
                        </div>

                        

                        <div class="form-group row" id="grade_div"  >
                            <label class="col-md-2">Student Grade</label>
                            <div class="col-md-6">
                                <select name="grade" id="grade" class="form-control select2">
                                    
                                    <option value="0">Choose Grade</option>    
                                    @foreach ($subjects as $subject)
                                        <option value="{{$subject->id}}" @if ($question->subject_id == $subject->id ) selected @endif>{{$subject->name}}</option>    
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        



                        <div class="form-group row">
                            <label class="col-md-2"></label>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script> 
        $(document).ready(function(){

            $("input[name=user_type][value='{{$question->user_type}}']").prop("checked",true);
            
            var grade_div = document.getElementById("grade_div");
            var parent_div = document.getElementById("parent_div");
            
            $("input[name=user_type]").click(function(){

                var radioValue = $("input[name='user_type']:checked").val();

                if(radioValue == 'student'){
                    grade_div.style.display = "block";
                    parent_div.style.display = "none";
                }else if(radioValue == 'parent'){
                    grade_div.style.display = "none";
                    parent_div.style.display = "block";
                }else if(radioValue == 'teacher'){
                    grade_div.style.display = "none";
                    parent_div.style.display = "none";
                }

            });

        });
    </script> 
@endsection