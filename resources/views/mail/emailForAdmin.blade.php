@extends('layouts.app')
@section('content')
 {{$email->body}}
 <div> by:</div>
 <div> {{$email->sedner}}</div>
@endsection