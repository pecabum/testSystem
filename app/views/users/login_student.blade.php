@extends('default')


@section('content')
<style>
    .input-field-style-username, .input-field-style-password {
        width: 55%;
        padding:10px; 
        margin: 10px auto; 
        font-size: 18px;
        border:1px solid #999; 
        border-radius:4px; 
        -moz-border-radius:4px; 
        -web-kit-border-radius:4px; 
        -khtml-border-radius:4px; 
    }
    label {
        text-align: right;
        display: block;		
        font-size: 18px;
    }

</style>

<center>
    <h1 style='font-size: 38px;'> Вход за студенти</h1>
</center>

{{ Form::open(['url' =>  'users/login',  'class'=>'form-style', 'method' => 'post']) }}
<table width="90%">	
    <tr> 
        <td align="center"> 
            <label>Име:
                <input type="text" class="input-field-style-username" size="20" name="name" placeholder="Въведи име" />
            </label>
        </td> </tr> 
    <tr> 
        <td align="center"> <label>Факултетен номер:
                <input type="text" class="input-field-style-username" size="20" name="fakNom" placeholder="Въведи факултетен номер" />
            </label>
        </td> 
    </tr> 
</table>

<div>
    {{ Form::submit("Стартирай Теста",array('class' => 'form-button')) }}
</div>
{{ Form::close() }}
<div style="color: red;">
    
{{ $errors->first('name') }}
{{ $errors->first('fakNom') }}

</div>
@stop


