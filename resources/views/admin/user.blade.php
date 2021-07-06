@extends("layouts.app")
@section('content')
<div class="container-fluid">
    <ul>
        <li>Name: {{$user->name}}</li>
        <li>email: {{$user->email}}</li>
        <li>Via: {{$userDetails->address}}</li>
        <li>Città: {{$userDetails->city}}</li>
        <li>Paese: {{$userDetails->country}}</li>
    </ul>
</div>
@endsection