@extends('default')

@section('content')
        <section class="container">
            <div class="login">
                <h1>Система за Online изпитване</h1>
               {{ Form::open(['route' => 'questions.create',  'class'=>'form-style']) }}

                    <p ><input type="text" name="fak_nomer" value="" placeholder="Факултетен Номер"></p>

                    <p class="submit"><input type="submit" name="commit" value="Login"></p>
               {{ Form::close() }}
            </div>

        </section>
 
@stop