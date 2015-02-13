@extends('default')


@section('content')
<center>
    <div style="margin: 10px;">
        <span class="moderator-message"> Hello, {{ $moderator->username }}!</span>
    </div>
    
    <div style="margin: 10px;">
        {{ HTML::link('questions/create', 'Добави въпрос', array('class' => 'myButton'))}} 
    </div>
    
    <div >
        {{ HTML::link('/login', 'Списък на въпросите', array('class' => 'myButton'), true)}} 
    </div>

    <div style="margin: 10px;">
        {{ HTML::link('/login', 'Списък на студентите', array('class' => 'myButton'))}}
    </div>

</center>



@stop


