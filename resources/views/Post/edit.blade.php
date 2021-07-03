@extends('layouts.app')
@section('content')
<div class="container-lg">
    <form action="{{ route('post.update', $post['id']) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title"> TITOLO </label> <br>
            <input type="text" name="title" id="title" value="{{ $post['title'] }}">
        </div>
        <div class="form-group">
            <label for="title"> DESCRIZIONE </label> <br>
            <textarea name="body" id="" cols="30" rows="10">{{ $post['body'] }} </textarea>
        </div>
        <div class="form-group">
            <label for="title"> AUTORE </label> <br>
            <input type="text" name="title" id="title" value="{{ $post['title'] }}">
        </div>
        <button type="submit" class="btn btn-primary"> Modifica </button>
        <form class="d-inline-block" action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete">
                Elimina
            </button>
        </form>

</div>

@endsection