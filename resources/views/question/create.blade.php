@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('home')}}" type="submit" class="btn btn-outline-dark mb-3">Go Back</a>
            <div class="card">
                <div class="card-header">Create New Question</div>

                <div class="card-body">
                    <form action="/questionnaires/{{$questionnaire->id}}/questions" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question[question]" class="form-control" id="question" aria-describedby="questionHelp" placeholder="Enter question" value="{{old('question.question')}}">
                            <small id="questionHelp" class="form-text text-muted">Ask simple and to-the-point question for best results.</small>
                            @error('question.question')
                            <small class="text-danger font-weight-bold">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                           <fieldset>
                               <legend>Choices</legend>
                               <small id="choicesHelp" class="form-text text-muted">Give choices that gives you the most insight to your question.</small>
                               <div>
                                <div class="form-group">
                                    <label for="answers1">Choice 1</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="answers1" aria-describedby="choicesHelp" placeholder="Enter Choice 1" value="{{old('answers.0.answer')}}">
                                    @error('answers.0.answer')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                    @enderror
                                </div>
                               </div>

                               <div>
                                <div class="form-group">
                                    <label for="answers2">Choice 2</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="answers2" aria-describedby="choicesHelp" placeholder="Enter Choice 2" value="{{old('answers.1.answer')}}">
                                    @error('answers.1.answer')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                    @enderror
                                </div>
                               </div>

                               <div>
                                <div class="form-group">
                                    <label for="answers3">Choice 3</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="answers3" aria-describedby="choicesHelp" placeholder="Enter Choice 3" value="{{old('answers.2.answer')}}">
                                    @error('answers.2.answer')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                    @enderror
                                </div>
                               </div>

                               <div>
                                <div class="form-group">
                                    <label for="answers4">Choice 4</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="answers4" aria-describedby="choicesHelp" placeholder="Enter Choice 4" value="{{old('answers.3.answer')}}">
                                    @error('answers.3.answer')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                    @enderror
                                </div>
                               </div>


                           </fieldset>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Question</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
