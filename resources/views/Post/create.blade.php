@extends('layouts.app')
@section('content')


<div class="container-lg">
    <form action="{{ route('post.store') }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title"> TITOLO </label> <br>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="title"> DESCRIZIONE </label> <br>
            <textarea name="body" id="" cols="30" rows="10" style="white-space: pre-wrap;"> </textarea>
        </div>
        <div class="form-group">
            <label for="category"> Categoria</label> <br>
            <select name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary"> CREA </button>
    </form>
    @endsection
