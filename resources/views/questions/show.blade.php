@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to All Questions</a>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="javascript:void(0);" class="vote-up" title="This question is useful">
                                <i class="fa fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">1234</span>
                            <a href="javascript:void(0);" class="vote-down off" title="This question is not useful">
                                <i class="fa fa-caret-down fa-3x"></i> 
                            </a>
                            <a href="javascript:void(0);" class="favorite" title="Click to mark is as favorite">
                                <i class="fa fa-star fa-3x"></i>
                                <span class="favorite-count">222</span>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">
                                    {{ $question->created_date }}
                                </span>
                                <div class="media mt-2">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{ $question->user->avatar }}" alt="" />
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $question->user->url }}">
                                            {{ $question->user->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2> {{ $question->answers_count.' '.\Illuminate\Support\Str::plural("answer", $question->answers_count) }} </h2>
                    </div>
                    <hr>
                    @foreach ($question->answers as $answer)
                        <div class="media">
                            <div class="media-body">
                                {!! $answer->body_html !!}
                                <div class="float-right">
                                    <span class="text-muted">
                                        {{ $answer->created_date }}
                                    </span>
                                    <div class="media mt-2">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" alt="" />
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $question->user->url }}">
                                                {{ $answer->user->name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
