@extends('default')

@section('content')

<script data-main="../../public/js/main" src="{{URL::to("js/libs/require.js") }}"></script>


<input type="hidden" id="qwerty" value="{{$user->id}}"/>
<div id="testDiv"/>

@stop
