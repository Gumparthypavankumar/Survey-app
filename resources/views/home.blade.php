@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    <a href="/questionnaires" class="btn btn-primary">Create New Questionaires</a>
                </div>
            </div>

            <div class="card mt-4">
                    <div class="card-header text-center">Your Questions</div>

                    <div class="card-body">
                        <ul class="list-group">
                                @foreach($questionnaires as $questionnaire)
                                    <li class="list-group-item"><a href="{{$questionnaire->path()}}">{{$questionnaire->title}}</a></li>
                                <div class="mt-2">
                                    <small class="font-weight-bold"> Share Url</small>
                                    <div>
                                    <a href="{{$questionnaire->publicpath()}}">{{$questionnaire->publicpath()}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
