@extends('layout.app')
@section('content')
<div>
<h1>{{$post->title}}</h1>
<p>{{$post->body}}</p>
<h4>{{$post->author}}</h4>
</div>
@endsection
