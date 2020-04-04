@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <h1>{{$questionnaire->title}}</h1>
            <form action="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" method="post">
            @csrf
            @foreach ($questionnaire->questions as $key=>$question)
            <div class="card mb-2">
                <div class="card-header "><strong>{{$key + 1}}</strong>.&ThickSpace;{{$question->question}}</div>
                <div class="card-body">
                @error('responses.'. $key .'.answer_id')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                <ul class="list-group">
                    @foreach ($question->answers as $answer)
                <label for="answer{{$answer->id}}"> 
                    <li class="list-group-item">
                    <input type="radio" name="responses[{{$key}}][answer_id]" 
                    {{(old('responses.'. $key .'.answer_id')== $answer->id ? 'checked' :'')}}
                    value="{{$answer->id}}" 
                    id="answer{{$answer->id}}" 
                    class="mr-2">
                    {{$answer->answer}}
                    </li>

                    <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                    <input type="hidden" name="responses[{{$key}}][questionnaire_id]" value="{{$questionnaire->id}}">
                </label>
                    @endforeach
                </ul>
                </div>
            </div>
            @endforeach

    <div class="card mt-4 ">
        <div class="card-header bg-dark text-white"><strong>Your Information</strong></div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="survey[name]" class="form-control" placeholder="Input your name" aria-describedby="helpId" value="{{old('survey.name')}}">
                      @error('survey.name')
                          <small class='text-danger'>{{$message}}</small>
                      @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="survey[email]" class="form-control" placeholder="Input your email" aria-describedby="helpId" value="{{old('survey.email')}}">
                    @error('survey.email')
                        <small class='text-danger'>{{$message}}</small>
                    @enderror
                      </div>
                </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </div>
    </div>

            </form>

       
        </div>
    </div>
</div>
@endsection
