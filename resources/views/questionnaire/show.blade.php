@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$questionnaire->title}}</div>

                <div class="card-body">
                    <a href="/questionnaires/{{$questionnaire->id}}/questions/create" class="btn btn-primary">Add Question</a>
                    <a class="btn btn-primary ml-4" href="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}">Take A Survey</a>
                </div>
            </div>

            @forelse($questions as $question)
                <div class="card mt-4">
                    <div class="card-header">{{$question->question}}</div>
    
                    <div class="card-body">
                        <ul class="list-group">
                                @forelse($question->answers as $answer)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>{{$answer->answer}}</div>
                                    <div>@if($question->responses()->count() > 0)
                                        {{intVal(($answer->responses()->count()*100)/$question->responses()->count())}}
                                        @else 0
                                        @endif
                                        %</div>
                                    </li>
                                @empty
                                    <li class="list-group-item">No Answers</li>
                                @endforelse
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form action="/questionnaires/{{$questionnaire->id}}/questions/{{$question->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete Question</button>
                        </form>
                    </div>
                </div>
            @empty 
                <div class="card mt-4">
                    <div class="card-header">No Questions</div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection