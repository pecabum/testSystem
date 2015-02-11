@extends('default')


@section('content')
<center>
    <h1 style='font-size: 38px;'> Създаване на нов въпрос :</h1>
    <h1><i>Въведете отговорите, след което маркирайте верния.</i></h1>
    <h2><a href="#" id="addScnt">Добави отговор</a></h2>
</center>

{{ Form::open(['route' => 'questions.store',  'class'=>'form-style']) }}

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
    {{ Form::submit("Register",array('class' => 'form-button')) }}
</div>

{{ Form::close() }}


{{ $errors->first('correct') }}
{{ $errors->first('question') }}


<script>

    $(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;

        $('#addScnt').live('click', function() {
            $('<p><label for="p_scnts"> Отговор ' + i + ' :\n\ <input type="radio" id="p_scnt" size="20" value="' + i + '" name="correct" />\
                   <input type="text" class="input-field-style" id="p_scnt" size="20" \n\
                          name="answers[]" \n\
                          value="" placeholder="Въведи отговор" /></label>\n\
                   <a href="#" id="remScnt">Remove</a></p>')
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