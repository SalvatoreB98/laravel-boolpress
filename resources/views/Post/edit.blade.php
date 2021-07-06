@extends('layouts.app')
@section('content')
<div class="container-lg">

     <div class="mt-2 mb-4 text-right" > <a href="{{ url()->previous() }}" class="btn btn-primary ">Torna indietro </a></div>   
    <form action="{{ route('post.update', $post['id']) }}" method="post" class="mb-3">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title"> TITOLO </label> <br>
            <input type="text" name="title" id="title" value="{{ $post['title'] }}">
        </div>

        <div class="form-group">
            <label for="body"> DESCRIZIONE </label> <br>
            <textarea class="form-control" name="body" id="body" wrap="hard" rows="10" style="white-space: pre-wrap; min-width: 75%' ">{{ $post['body'] }} </textarea>
        </div>

         <div class="form-group">
            <label for="url"> IMG URL </label> <br>
            <input class="form-control" type="text" name="url" id="url" value="{{$post['url']}}">
        </div>

        {{-- CATEGORY --}}
        <div class="mt-4"> <label for="">Category:</label></div>
        <select name="category_id" id="category">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        {{-- TAG CHECHBOX --}}
        <div class="mt-4"> <label for="">Tags:</label></div>
        @foreach($tags as $tag)
        <div class="form-check form-check-inline">
            <label class="form-check-label">{{$tag->name}}
                <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
            </label>
        </div>
        @endforeach


        <br>

        <div class="mt-3 d-inline-block">
            <button type="submit" class="btn btn-primary"> Modifica <i class="fa fa-pencil" aria-hidden="true"></i> </button>
        </div>

    </form>

    <form class="d-inline-block" action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger delete">
            Elimina <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
    </form>

</div>

@endsection
