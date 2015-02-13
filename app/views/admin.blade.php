<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Admin Panel - Добре Дошли </title>

        <!-- Main stylesheet -->
        <!--{{HTML::style('css/style.css')}}-->
        {{HTML::style('css/styles.css')}}
    </head>
    <body>
        <!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_8">
                        &nbsp;
                    </div>
                    <div class="grid_4"> 


                        <a href="" id="logout">
                            Logout
                        </a>


                        <span style="padding: 9px 20px 11px 0px;display: block;float: right;">Hello, User</span>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->

        </div> <!-- End #header-main -->
        <div style="clear: both;"></div>
        <!-- Sub navigation -->

        <div class="container_12">

            <!-- Dashboard icons -->
            <center>
                <div class="grid_7">
                    <a href="{{ URL::to('questions/create')}}" class="dashboard-module">
                        <img src="{{ URL::to('images/Crystal_Clear_write.gif')}}" width="64" height="64" alt="edit" />
                        <span>New article</span>
                    </a>


                    <a href="" class="dashboard-module">
                        <img src="{{ URL::to('images/Crystal_Clear_files.gif')}}" width="64" height="64" alt="edit" />
                        <span>Articles</span>
                    </a>


                    <a href="" class="dashboard-module">
                        <img src="{{ URL::to('images/Crystal_Clear_stats.gif')}}" width="64" height="64" alt="edit" />
                        <span>Stats</span>
                    </a>

                    <div style="clear: both"></div>
                </div> <!-- End .grid_7 -->
            </center> <div style="clear:both;"></div>

            @yield('content')

            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->


        <!-- Footer -->
        <div id="footer">
            <div class="container_12">
                <div class="grid_12">
                    <!-- You can change the copyright line for your own -->
                    <p>&copy; 2010. <a href="http://www.templatescreme" title="Visit For More Free Website Templates">Free Website Templates</a></p>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
    </body>
</html>
