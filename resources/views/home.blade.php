@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="title m-b-md">
            <h1>POSTS: </h1>
        </div>

        <div class="container-fluid">
            @foreach($posts as $post)
            <div>
                <h1>{{$post['title']}}</h1>
                <p>{{$post['body']}}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
