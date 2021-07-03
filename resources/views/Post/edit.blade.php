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
            <button type="submit" class="btn btn-primary"> MODIFICA </button>
        </form>

    </div>

@endsection
