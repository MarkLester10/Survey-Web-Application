@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('home')}}" type="submit" class="btn btn-outline-dark mb-3"><i class="fa fa-arrow-left"></i>&ThickSpace;Go Back</a>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yass!</strong>&ThickSpace;{{ session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header bg-dark text-white text-center"><h3>{{$questionnaire->title}}</h3></div>

                <div class="card-body">
                    <p>{{$questionnaire->purpose}}</p>
                    <a href="/questionnaires/{{$questionnaire->id}}/questions/create" type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&ThickSpace;Add Question</a>
                    <a href="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" type="submit" class="btn btn-dark"><i class="fa fa-share"></i>&ThickSpace;Take Survey</a>
                </div>
            </div>

                <div class="alert alert-success m-2 p-1 text-center" role="alert">
                    <h4>List of Questions</h4>
                </div>

            @forelse ($questionnaire->questions as $key=> $question)
            <div class="card mb-2 rounded">
                <div class="card-header ">{{++$key}}.&ThickSpace;{{$question->question}}</div>
              <div class="card-body">
                <ul class="list-group">
                    @foreach ($question->answers as $answer)
                    <li class="list-group-item d-flex justify-content-between">
                        <div>{{$answer->answer}}</div>
                        @if ($question->responses->count())
                        <div>{{intval($answer->responses->count() * 100 / $question->responses->count())}}&ThickSpace;%</div>
                        @else
                        <div>{{$answer->responses->count()}}&ThickSpace;%</div>
                        @endif
                    </li>
                    @endforeach
                    <small class="font-weight-bold mt-3">Total Respondents:&ThickSpace;{{$question->responses->count()}}</small>
                </ul>
              </div>
              <div class="card-footer">
                  <form action="/questionnaires/{{$questionnaire->id}}/questions/{{$question->id}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-outline-danger btn-sm">Delete Question</button>
                  </form>
              </div>
            </div>
            @empty
            <div class="container m-2">
                <div class="alert alert-warning w-25 text-center p-1 m-auto" role="alert">
                    <small>No questions added yet.</small>
                </div>
            </div>
            @endforelse

        </div>
    </div>
</div>
@endsection
