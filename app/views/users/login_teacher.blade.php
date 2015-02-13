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
		    <h1 style='font-size: 38px;'> Вход за преподаватели</h1>
		</center>

		{{ Form::open(['url' => 'cms/login',  'class'=>'form-style', 'method' => 'post']) }}
		<table width="90%">	<tr> 
		<td align="center"> <label>Потребителско име:
		<input type="text" class="input-field-style-username" size="20" name="username" placeholder="Въведи потребителско име" />
		</label>
		<label>Парола:
		<input type="password" class="input-field-style-password" size="20" name="password" placeholder="Въведи парола" />
		 </label>
		</td> </tr> </table>

		<div>
		    {{ Form::submit("Влизане",array('class' => 'form-button')) }}
		</div>
		{{ Form::close() }}


		{{ $errors->first('username') }}
		{{ $errors->first('password') }}

@stop


