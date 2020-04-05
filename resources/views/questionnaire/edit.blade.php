@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('home')}}" type="submit" class="btn btn-outline-dark mb-3"><i class="fa fa-arrow-left"></i>&ThickSpace;Go Back</a>
            <div class="card">
                <div class="card-header">Edit Questionnaire</div>

                <div class="card-body">
                    <form action="{{route('questionnaires.update', $questionnaire->id)}}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter title" value="{{$questionnaire->title}}">
                            <small id="titleHelp" class="form-text text-muted">Attract your respondents with a catchy title.</small>
                            @error('title')
                            <small class="text-danger font-weight-bold">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input type="text" name="purpose" class="form-control" id="purpose" aria-describedby="titleHelp" placeholder="Enter purpose" value="{{$questionnaire->purpose}}">
                            <small id="purposeHelp" class="form-text text-muted">A purpose for a question will increase responses.</small>
                             @error('purpose')
                            <small class="text-danger font-weight-bold">{{$message}}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
