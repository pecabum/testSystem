@extends('admin')


@section('content')

<div class="grid_12">

    <!-- Notification boxes -->
    <span class="notification n-success">Всички въпроси</span>

    <!-- Example table -->
    <div class="module">
        <pre>
            <?php // var_dump($questions);exit;?>
        </pre>
        <div class="module-table-body">
            <form action="">
                <table id="myTable" class="tablesorter">
                    <thead>
                        <tr>
                            <th style="width:5%">#</th>
                            <th style="width:30%">Въпрос?</th>
                            <th style="width:50%">Отговори</th>
                            <th style="width:15%"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($questions as $key=>$question)

                            <tr>
                                <td class="align-center">{{ $key+1}}</td>
                                <td><a href=""> {{ $question['question'] }}</a></td>
                                <td>
                                    <ul style="margin-left: 30px;">
                                    @foreach($question['answers'] as $answer)
                                    <li>{{ $answer['answer']}}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                    <td>
                                    <a href=""><img src="{{ URL::to('images/cross-on-white.gif')}}" width="26" height="26" alt="delete" /></a>
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </form>







        </div>
    </div>

</div> <!-- End .grid_12 -->

@stop

