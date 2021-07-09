@extends('layouts.app')

@section('content')
@auth
<div class="container-fluid p-5">
    <div class="justify-content-center">
        <div class="post">
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
    <div>
        @endauth


        @auth
        <div class="card post mt-5 mb-5">
            <div class="card-header">
                AGGIUNGI UN NUOVO POST
            </div>

            <div class="card-body">
                <h5 class="card-title"> Crea da zero un nuovo post</h5>
                <a href="{{route('post.create')}}" class="btn btn-primary"> Crea </a>
            </div>
        </div>
        @endauth

        <div class="post">
            @if(count($posts)==0)
            <h5>Ancora nessun post disponibile</h5>
            @endif
            @foreach ($posts as $post)
            <div class="post mb-5 d-flex justify-content-between">
                <div class="flex-fill w-75 m-auto">

                    <h1>{{ $post['title'] }}</h1>
                    <p> {!! \Illuminate\Support\Str::limit(nl2br(e($post->body)) , 400, $end='...') !!}</p>
                    <a href="{{ route('post.show', $post['id']) }}" class="btn btn-secondary"> Dettagli <i class="fa fa-info" aria-hidden="true"></i> </a>
                    @auth

                    <a href="{{ route('post.edit', $post['id']) }}" class="btn btn-primary">Modifica <i class="fa fa-pencil" aria-hidden="true"></i></a>

                    <form class="d-inline-block" action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete">
                            Elimina <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>

                    </form>
                    @endauth
                </div>
                <div class="p-5">
                    <img class="poster" src="{{$post->url}}" alt="" style="max-width:250px;">
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
