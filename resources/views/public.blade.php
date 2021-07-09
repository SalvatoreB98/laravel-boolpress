@extends('layouts.app')
@section('email-link')
@section('content')
<div class="flex-center position-ref full-height">

    <div class="container-fluid">
        <div class="title m-b-md">
        </div>

        <div class="container-fluid ">

            @if(count($posts)==0)
            <h5>Ancora nessun post disponibile</h5>
            @endif

            @foreach($posts as $post)
            <div class="mb-5 d-flex justify-content-between">
                <div>

                    <h1>{{ $post['title'] }}</h1>
                    <p> {!! \Illuminate\Support\Str::limit(nl2br(e($post->body)) , 750, $end='...') !!} </p>
                    <a href="{{ route('post.show', $post['id']) }}" class=""> Continua a leggere </a>
                </div>
                <div class="p-5 align-self-center">
                    <img class="poster" src="{{$post->url}}" alt="" style="max-width:250px;">
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>

@endsection
