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

		<center>
		<div style="align:center; width:80%;margin-top:20px;">
			<img src="../images/caution_icon.jpg" width="15%" height="auto" align="left">
			<font color="red" style='font-size: 35px;align:justify;' >Съжаляваме, тестът може да бъде попълнен <b>само по веднъж </b> от всеки студент. </font>
		</div>	
		</center>	

@stop


