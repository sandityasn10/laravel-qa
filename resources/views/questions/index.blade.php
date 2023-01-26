@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex align-items-start counters">
                                <div class="vote">
                                    <strong>{{$question->votes}}</strong> {{Str::plural('vote',$question->votes)}}
                                </div>
                                <div class="status {{$question->status}}">
                                    <strong>{{$question->answers}}</strong> {{Str::plural('answer',$question->answers)}}
                                </div>
                                <div class="view">
                                    {{$question->views . " " . Str::plural('view',$question->views)}}
                                </div>
                            </div>
                            <div class="media-body">
                                <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
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
