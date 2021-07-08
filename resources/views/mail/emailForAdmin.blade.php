@extends('layouts.app')
@section('content')
 {{$email['body']}}
 <div> by:</div> 
 @dump($email)
 <div> {{$email["email"]}}</div>
@endsection