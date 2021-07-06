@extends('layouts.app')
@section('content')
<div class="container-fluid flex-fill ">
    <div class="mt-2 mb-4 text-right"> <a href="{{ url()->previous() }}" class="btn btn-primary ">Torna indietro </a></div>
    <div class="w-75 m-auto">
        <div class="text-center"><img src="{{$post->url}}" alt="" class="mb-5"></div>
        <h1>{{ $post->title }}</h1>
        <p>{!! nl2br(e($post->body)) !!}</p>
        <div class=" mt-4"> Categoria: <i> {{$post->category ? $post->category->name : 'nessuna categoria'}} </i></div>

        @if($user != null)
        <p>By: {{$user ->name}} ({{$user->email}})</p>
        @endif

        <div class=" mt-4">
            Tags:
            @foreach($post->tags as $tag)
            <span class="badge badge-secondary d-inline-block p-2">{{$tag->name}}</span>
            @endforeach
        </div>
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
</div>

@endsection
