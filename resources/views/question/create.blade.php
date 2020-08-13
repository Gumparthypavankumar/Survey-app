@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">ADD New Question</div>

                <div class="card-body">
                <form action="/questionnaires/{{$questionnaire->id}}/questions" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" class="form-control" id="question" name="question[question]" aria-describedby="questionHelp"
                                 autocomplete="off" value="{{old('question.question')}}" placeholder="Enter question">
                                <small id="questionHelp" class="form-text text-muted">Give  quetion that is straight to point in order to get best results.</small>
                                @error('question.question')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                                <fieldset>
                                    <legend>Choices</legend>
                                    <small id="ChoicesHelp" class="form-text text-muted">Give your choice</small>

                                    <div class="form-group">
                                        <label for="answer1">Choice1</label>
                                        <input type="text" class="form-control" id="answer1" name="answers[][answer]" aria-describedby="ChoicesHelp"
                                            autocomplete="off" value="{{old('answers.0.answer')}}" placeholder="Enter Choice 1">
                                        <small id="answerHelp" class="form-text text-muted">Give  quetion that is straight to point in order to get best results.</small>
                                        @error('answers.0.answer')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="answer2">Choice2</label>
                                        <input type="text" class="form-control" id="answer2" name="answers[][answer]" aria-describedby="ChoicesHelp"
                                            autocomplete="off" value="{{old('answers.1.answer')}}" placeholder="Enter Choice 2">
                                        <small id="answerHelp" class="form-text text-muted">Give  quetion that is straight to point in order to get best results.</small>
                                        @error('answers.1.answer')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="answer3">Choice3</label>
                                        <input type="text" class="form-control" id="answer3" name="answers[][answer]" aria-describedby="ChoicesHelp"
                                            autocomplete="off" value="{{old('answers.2.answer')}}" placeholder="Enter Choice 3">
                                        <small id="answerHelp" class="form-text text-muted">Give  quetion that is straight to point in order to get best results.</small>
                                        @error('answers.2.answer')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="answer4">Choice4</label>
                                        <input type="text" class="form-control" id="answer4" name="answers[][answer]" aria-describedby="ChoicesHelp"
                                            autocomplete="off" value="{{old('answers.3.answer')}}" placeholder="Enter Choice 4">
                                        <small id="answerHelp" class="form-text text-muted">Give  quetion that is straight to point in order to get best results.</small>
                                        @error('answers.3.answer')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                            </fieldset>

                            <button type="submit" class="btn btn-primary">Create Questionnaire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
