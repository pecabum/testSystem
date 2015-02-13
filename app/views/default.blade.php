<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <meta charset="utf-8">
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
       
        <meta charset="utf-8">
        {{HTML::style('css/style.css')}}
    </head>

    <body>
        <div class="main">
            <div class="page">
                <div class="header">
                    <h1>ТУ-Варна - Система за тестове</h1>
                </div>

                <div class="content">		
                    @yield('content')
                </div>

                <hr>
                <center><font size="small" color="gray"> &copy; Copyright <b>2015</b>
                    </font>
                </center>
            </div>
        </div>
    </body>

</html>
