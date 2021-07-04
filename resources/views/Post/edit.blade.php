@extends('layouts.app')
@section('content')
<div class="container-lg">
    <form action="{{ route('post.update', $post['id']) }}" method="post" class="mb-3">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title"> TITOLO </label> <br>
            <input type="text" name="title" id="title" value="{{ $post['title'] }}">
        </div>
        <div class="form-group">
            <label for="title"> DESCRIZIONE </label> <br>
            <textarea class="form-control" name="body" id="" wrap="hard" rows="10" style="white-space: pre-wrap; min-width: 75%' ">{{ $post['body'] }} </textarea>
        </div>
        <select name="category_id" id="category">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <br>
        <div class="mt-3 d-inline-block">
            <button type="submit" class="btn btn-primary"> Modifica </button>
        </div>
    </form>
    <form class="d-inline-block" action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger delete">
            Elimina
        </button>
    </form>

</div>

@endsection
