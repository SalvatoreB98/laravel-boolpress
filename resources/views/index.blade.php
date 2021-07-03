@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
    </div>
    @endif

    <div class="container-fluid">
        <div class="title m-b-md">
        </div>

        <div class="container-fluid">
            @foreach($posts as $post)
            <div class=" mb-5">
                <h1>{{$post['title']}}</h1>
                <p>{{$post['body']}}</p>
                <p> by: {{$post['author']}}</p>
                <a href="{{route('post.show',$post["id"])}}"> DETTAGLI </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection