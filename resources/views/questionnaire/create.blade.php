@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Questionnaire</div>

                <div class="card-body">
                    <form action="/questionnaires" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp"
                                 autocomplete="off" value="{{old('title')}}" placeholder="Enter Title">
                                <small id="titleHelp" class="form-text text-muted">Give a cool title that attracts user</small>
                                @error('title')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="purpose">Purpose</label>
                                <input type="text" class="form-control" id="purpose" name="purpose" aria-describedby="purposeHelp" 
                                autocomplete="off" value="{{old('purpose')}}" placeholder="Enter Purpose">
                                <small id="purposeHelp" class="form-text text-muted">Give a purpose for yor questionnaire</small>
                                @error('purpose')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Create Questionnaire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
