@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <p>By: {{$user ->name}} ({{$user->email}})</p>
        @auth
            <a href="{{ route('post.edit', $post['id']) }}" class="btn btn-primary mb-3">Modifica</a> <br>
            <form class="d-inline-block" action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete">
                    Elimina
                </button>
            </form>
        @endauth
    </div>

@endsection
