@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card m-3">
                <div class="card-body">
                    <form method="POST" action="{{route('post.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Post Title:</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title">
                        </div>
                        <div class="form-group">
                            <label for="text">Post Text:</label>
                            <textarea class="form-control" id="text" name="text" rows="5" placeholder="Enter post text"></textarea>
                        </div>
                        <button type="submit" class="btn m-2 btn-primary">Submit</button>
                    </form>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>

            @foreach ($posts as $post)
            <div class="card m-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->text }}</p>
                    <a href="/post/{{$post->id}}" class="btn btn-primary">Read More</a>
                </div>
                <div class="card-footer text-muted">
                    {{$post->user->name}}
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


        </div>
    </div>
</div>
@endsection
