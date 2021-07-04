@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <div> <i> {{$post->category ? $post->category->name : 'nessuna categoria'}} </i></div>
    @if($user != null)
    <p>By: {{$user ->name}} ({{$user->email}})</p>
    @endif

    @auth
    <hr>
    <div class="mt-5">
        <a href="{{ route('post.edit', $post['id']) }}" class="btn btn-primary">Modifica</a> 
        <form class="d-inline-block" action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete">
                Elimina
            </button>
        </form>
    </div>
    @endauth
</div>

@endsection
