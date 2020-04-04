@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yass!</strong>&ThickSpace;{{ session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-dark" href="{{route('questionnaires.create')}}" role="button"><i class="fa fa-plus-circle"></i>&ThickSpace;Create New Questionnaire</a>
                </div>
            </div>


            <div class="card mt-4">
                <div class="card-header">My Questionnaires</div>
                <div class="card-body">
                    <ul class="list-group">
                    @forelse ($questions as $question)
                    <li class="list-group-item">
                      <div class="d-flex align-items-center">
                        <a href="{{$question->path()}}" class="font-weight-bold text-success">{{$question->title}}</a>
                        <div class="d-flex ml-auto align-items-center justify-content-between w-25">
                          <form action="{{route('questionnaires.destroy',$question->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-danger b-0 p-0 bg-white border-0 mt-2" href="#"><h5><i class="fa fa-trash"></i></h5></button>
                          </form>
                          <a class="text-success mt-2" href="{{route('questionnaires.edit', $question->id)}}"><h5><i class="fa fa-edit"></i></h5></a>
                        </div>
                      </div>
                      <small class="font-weight-bold mt-2">Share URL</small>
                      <small><a href="{{$question->publicPath()}}" class="d-block">{{$question->publicPath()}}</a></small>
                    </li>
                    @empty
                    <li class="list-group-item alert alert-warning p-0 w-50 m-auto text-center">
                        <p class="mt-2">No Questionnaires to show.</p>
                    </li>
                    @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>

    
    <div class="col-md-8">
        {{$questions->links()}}
    </div>



</div>
@endsection
