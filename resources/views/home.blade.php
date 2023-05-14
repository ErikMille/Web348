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
                <a href="/post/{{$post->id}}" class="btn btn-primary">Read More {{$post->id}}</a>
            </div>
            <div class="card-footer text-muted">
                Posted on May 13, 2023 by John Doe
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">Commenter Name</h6>
                    <small>1 day ago</small>
                </div>
                <p class="mb-1">This is a comment about the blog post.</p>
                </li>
                <li class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">Another Commenter</h6>
                    <small>2 days ago</small>
                </div>
                <p class="mb-1">This is another comment about the blog post.</p>
                </li>
            </ul>
            </div>
            @endforeach


        </div>
    </div>
</div>
@endsection
