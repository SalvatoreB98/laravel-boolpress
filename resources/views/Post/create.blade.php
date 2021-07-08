@extends('layouts.app')
@section('content')


<div class="container-lg">

    <div class="mt-2 mb-4 text-right"> <a href="{{ url()->previous() }}" class="btn btn-primary ">Torna indietro </a></div>
    <div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <form action="{{ route('post.store') }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title"> TITOLO </label> <br>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="title"> DESCRIZIONE </label> <br>
            <textarea class="form-control" name="body" id="" cols="30" rows="10" style="white-space: pre-wrap;"> {{ old('body') }} </textarea>
        </div>
        <div class="form-group">
            <label for="title"> IMG URL </label> <br>
            <input class="form-control" type="text" name="url" id="url">
        </div>
        <div class="form-group">
            <label for="category"> Categoria</label> <br>
            <select name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            {{-- TAG CHECHBOX --}}
            <div class="mt-4"> <label for="">Tags:</label></div>
            @foreach($tags as $tag)
            <div class="form-check form-check-inline">
                <label class="form-check-label">{{$tag->name}}
                    <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                </label>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary"> CREA </button>
    </form>
    @endsection
