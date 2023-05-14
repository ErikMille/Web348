@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->text }}</p>
            </div>
            <div class="card-footer text-muted">
                Posted on May 13, 2023 by John Doe
            </div>
            <ul class="list-group list-group-flush">

                @foreach ($post->comments as $comment)
                <li class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">{{$comment->user->name}}</h6>
                    <small>{{$comment->timestamps}}</small>
                </div>
                <p class="mb-1">{{$comment->text}}</p>
                </li>
                @endforeach
            </ul>
            </div>

        </div>
    </div>
</div>
@endsection
