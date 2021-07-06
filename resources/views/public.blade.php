@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">

    <div class="container-fluid">
        <div class="title m-b-md">
        </div>

        <div class="container-fluid ">
            @foreach($posts as $post)
                       <div class="mb-5 d-flex">
                <div>

                    <h1>{{ $post['title'] }}</h1>
                    <p>{!! nl2br(e($post->body)) !!}</p>
                    <a href="{{ route('post.show', $post['id']) }}" class="btn btn-secondary"> Dettagli </a>
                </div>
                <div class="p-2 align-self-center">
                    <img class="poster" src="{{$post->url}}" alt="" style="max-width:250px;">
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>

@endsection
