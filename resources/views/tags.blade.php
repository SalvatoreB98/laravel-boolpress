@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="mt-2 mb-4 text-right"> <a href="{{ url()->previous() }}" class="btn btn-primary ">Torna indietro </a></div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tag Name</th>
                <th scope="col">Count</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
               <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->name}}</td>
                <td>@dump(count($tag->posts))</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
