@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Question</h2>
                        <div class="ml-auto">
                            <a href="{{route('question.create')}}" class="btn btn-outline-secondary">Ask question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts.message')
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex align-items-start counters">
                                <div class="vote">
                                    <strong>{{$question->votes}}</strong> {{Str::plural('vote',$question->votes)}}
                                </div>
                                <div class="status {{$question->status}}">
                                    <strong>{{$question->answers_count}}</strong> {{Str::plural('answer',$question->answers_count)}}
                                </div>
                                <div class="view">
                                    {{$question->views . " " . Str::plural('view',$question->views)}}
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
                                    <div class="ml-auto">
                                        @can ('update',$question)
                                            <a href="{{route('question.edit',$question->id)}}" class="btn btn-sm btn-outline-info">edit</a>
                                        @endcan

                                        @can ('delete',$question)
                                            <form class="form-delete" action="{{route('question.destroy', $question->id)}}" method="POST">
                                                @method('DELETE')
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('are you sure')">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                <p class="lead">
                                    Asked By
                                    <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                    <small class="text-muted">{{$question->created_date}}</small>
                                </p>
                                {{Str::limit($question->body,250)}}
                            </div>
                        </div>
                        <br>
                    @endforeach
                    <div class="mx-auto">
                        {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
