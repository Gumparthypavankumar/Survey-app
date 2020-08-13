@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{$questionnaire->title}}</h1>
            <form action="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" method="post">
                @csrf
                @forelse($questionnaire->questions as $key => $question)
                    <div class="card">
                    <div class="card-header"><strong class="mr-2">{{$key + 1}}.</strong>{{$question->question}}</div> 
                        <div class="card-body">
                            @error('responses.'.$key.'.answer_id')
                            <small class="alert-danger">{{$message}}</small>
                            @enderror
                            <ul class="list-group">
                                @forelse($question->answers as $answer)
                                    <label for="answer{{$answer->id}}">
                                        <li class="list-group-item">
                                            <input type="radio" name="responses[{{$key}}][answer_id]" class="mr-4" id="answer{{$answer->id}}"
                                            {{old('responses.'.$key.'.answer_id') == $answer->id ? 'checked' :''}}
                                        value="{{$answer->id}}"/>
                                        <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}"/>
                                        {{$answer->answer}}
                                        </li>
                                    </label>
                                @empty
                                <div>No Answers</div>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="alert-danger">No Questions</div>
                @endforelse
                <div class="card mt-4">
                    <div class="card-header text-center"><strong>Your Information</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="survey[name]" aria-describedby="nameHelp"
                                autocomplete="off" value="{{old('survey.name')}}" placeholder="Enter name">
                            <small id="nameHelp" class="form-text text-muted">Please provide your name?</small>
                            @error('survey.name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name="survey[email]" aria-describedby="emailHelp" 
                            autocomplete="off" value="{{old('survey.email')}}" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">Enter your email please!</small>
                            @error('survey.email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="mt-4 btn btn-primary">Submit survey</button>
            </form>
        </div>
    </div>
</div>
@endsection
