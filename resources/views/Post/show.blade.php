@extends('layouts.app')
@section('content')
<div class="container-fluid flex-fill ">
    <div class="mt-2 mb-4 text-right"> <a href="{{ url()->previous() }}" class="btn btn-primary ">Torna indietro </a></div>
    <div class="w-75 m-auto">
        <div class="text-center mb-5"><img class="w-100" src="{{$post->url}}" alt="" class="mb-5" style="max-height:300px; object-fit:contain"></div>
        <h1>{{ $post->title }}</h1>
        <p>
            <img src="{{asset('storage/' . $post->file)}}" class="float-right mt-5" style="max-width:250px" alt="">
            {!! nl2br(e($post->body)) !!}
        </p>
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
            <a href="{{ route('post.edit', $post['id']) }}" class="btn btn-primary">Modifica <i class="fa fa-pencil" aria-hidden="true"></i></a>
            <form class="d-inline-block" action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete">
                    Elimina <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        @endauth
    </div>
</div>

@endsection
