@extends('default')

@section('content')
    <h1>
        All users
    </h1>
    <li> {{ $user->username }}</li>
    <li> {{ $user->password }}</li>
@stop

