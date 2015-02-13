@extends('admin')


@section('content')

<div class="grid_12">

    <!-- Notification boxes -->
    <span class="notification n-success">Студенти , издържали изпита</span>

    <!-- Example table -->
    <div class="module">

        <div class="module-table-body">
            <form action="">
                <table id="myTable" class="tablesorter">
                    <thead>
                        <tr>
                            <th style="width:5%">#</th>
                            <th style="width:20%">Име Студент </th>
                            <th style="width:21%">Фак.Ном.</th>
                            <th style="width:13%">Точки</th>
                            <th style="width:15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($users as $key=>$user)

                        <tr>
                            <td class="align-center">{{$key + 1}}</td>
                            <td><a href="">{{ $user['username'] }}</a></td>
                            <td>{{ $user['fak_nom'] }}</td>
                            <td>{{$user['points']}}</td>
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

