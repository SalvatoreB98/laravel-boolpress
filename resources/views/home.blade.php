@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Area:') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Sei amministratore!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card  mt-5 mb-5">
            <div class="card-header">
                AGGIUNGI UN NUOVO POST
            </div>
            <div class="card-body">
                <h5 class="card-title"> Crea da zero un nuovo post</h5>
                <a href="{{route('post.create')}}" class="btn btn-primary"> ADD </a>
            </div>
        </div>
        <div class="container-fluid">
            @foreach ($posts as $post)
            <div class="mb-5">
                <h1>{{ $post['title'] }}</h1>
                <p>{{ $post['body'] }}</p>
                <p> by: {{$post['author']}}</p>
                <a href="{{ route('post.show', $post['id']) }}"> DETTAGLI </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
