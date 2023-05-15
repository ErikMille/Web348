@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            @foreach ($posts as $post)
            <div class="card m-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->text }}</p>
                    <a href="/post/{{$post->id}}" class="btn btn-primary">Read More</a>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('user',['id'=>$post->user->id]) }}">{{$post->user->name}}</a>
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
            @endforeach
            <div class="row">
                <div class="d-flex justify-content-center">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
