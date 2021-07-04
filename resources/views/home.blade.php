@extends('layouts.app')

@section('content')
@auth
<div class="container-fluid">
    <div class="container-fluid justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Area:') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <strong>{{ __('Sei amministratore!') }}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @endauth


        @auth
        <div class="card  mt-5 mb-5">
            <div class="card-header">
                AGGIUNGI UN NUOVO POST
            </div>
            <div class="card-body">
                <h5 class="card-title"> Crea da zero un nuovo post</h5>
                <a href="{{route('post.create')}}" class="btn btn-primary"> ADD </a>
            </div>
        </div>
        @endauth

        <div class="container-fluid">
            @if(count($posts)==0)
            <h5>Ancora nessun post disponibile</h5>

            @endif
            @foreach ($posts as $post)
            <div class="mb-5">
                <h1>{{ $post['title'] }}</h1>
                <p>{!! nl2br(e($post->body)) !!}</p>
                <a href="{{ route('post.show', $post['id']) }}"> DETTAGLI </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
