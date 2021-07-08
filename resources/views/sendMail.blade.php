@extends('layouts.app')
@section('content')
<div class="container-fluid">
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
    <form method="post" action="route()">
    </form>
</div>

@endsection
