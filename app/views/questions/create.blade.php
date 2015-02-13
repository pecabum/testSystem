@extends('admin')


@section('content')
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<style>
    .input-field-style-question {
        width: 90%;
        padding:10px; 
        margin: 10px auto; 
        display: block;
        font-size: 18px;
        border:1px solid #999; 
        border-radius:4px; 
        -moz-border-radius:4px; 
        -web-kit-border-radius:4px; 
        -khtml-border-radius:4px; 
    }
</style>



<center>
    <h1 style='font-size: 38px;'> Създаване на нов въпрос :</h1>
    <h1><i>Въведете отговорите, след което маркирайте верния.</i></h1>
    <h2><a href="#" id="addScnt">Добави отговор</a></h2>
</center>

{{ Form::open(['url' =>  'questions',  'class'=>'form-style', 'method' => 'post']) }}

<input type="text" class="input-field-style-question" id="p_scnt" size="20" name="question" value="a" placeholder="Въведи въпрос" />

<div id="p_scents">
    <p>
        <label for="p_scnts">    
            Отговор 1 :
            <input type="radio" id="p_scnt" size="20" value="1"  name="correct" />
            <input type="text" class="input-field-style" id="p_scnt" size="20" name="answers[]" value="" placeholder="Въведи отговор" />
        </label>
    </p>
</div>

<div>
    {{ Form::submit("Добави въпрос",array('class' => 'form-button')) }}
</div>

{{ Form::close() }}


{{ $errors->first('correct') }}
{{ $errors->first('question') }}


<script>

$(function() {
    var scntDiv = $('#p_scents');
    var i = $('#p_scents p').size() + 1;

    $('#addScnt').live('click', function() {
        $('<p><label for="p_scnts"> Отговор ' + i + ' :  \n\ <input type="radio" id="p_scnt" size="20" value="' + i + '" name="correct" /><a href="#" id="remScnt">Remove</a>\
                   <input type="text" class="input-field-style" id="p_scnt" size="20" \n\
                          name="answers[]" \n\
                          value="" placeholder="Въведи отговор" /></label>\n\
                   </p>')
                .appendTo(scntDiv);
        i++;
        return false;
    });

    $('#remScnt').live('click', function() {
        if (i > 2) {
            $(this).parents('p').remove();
            i--;
        }
        return false;
    });
});
$(document).ready(function() {
    $('#p_scnt').keyup(function(event) {
        var input = $(this);
        var message = $(this).val();
        console.log(message);
        if (message) {
            input.removeClass("invalid").addClass("valid");
        }
        else {
            input.removeClass("valid").addClass("invalid");
        }
    });
});
</script>


@stop


