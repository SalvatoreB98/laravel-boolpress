@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <h4>{{ $post->author }}</h4>
        @auth
            <a href="{{ route('post.edit', $post['id']) }}" class="btn btn-primary mb-3">MODIFICA</a> <br>
            <form class="d-inline-block" action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Elimina
                </button>
            </form>
        @endauth
    </div>

@endsection
