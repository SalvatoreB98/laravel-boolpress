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
    <form method="post" action="{{route('sendMail.send')}}">
        @csrf
        <div class="form-group">
            <label for="title">Inserire la propia e-mail </label> <br>
            <input class="form-control" type="email" name="email" id="email" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="title"> MESSAGGIO </label> <br>
            <textarea class="form-control" name="body" id="" cols="30" rows="10" style="white-space: pre-wrap;"> {{ old('body') }} </textarea>
        </div>
        <input class="btn btn-primary" type="submit">
    </form>
</div>

@endsection
