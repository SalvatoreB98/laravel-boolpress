@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login as administrator</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register as administrator</a>
        @endif
        @endauth
    </div>
    @endif

    <div class="container-fluid">
        <div class="title m-b-md">
            <h1>POSTS: </h1>
        </div>

        <div class="container-fluid">
            @foreach($posts as $post)
            <div>
                <h1>{{$post['title']}}</h1>
                <p>{{$post['body']}}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
