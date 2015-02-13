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

                        <tr>
                            <td class="align-center">1</td>
                            <td><a href="">Don Quixote</a></td>
                            <td>12345678</td>
                            <td>20</td>
                            <td>
                                <a href=""><img src="{{ URL::to('images/cross-on-white.gif')}}" width="26" height="26" alt="delete" /></a>
                            </td>
                        </tr> 

                    </tbody>
                </table>
            </form>







        </div>
    </div>

</div> <!-- End .grid_12 -->

@stop

