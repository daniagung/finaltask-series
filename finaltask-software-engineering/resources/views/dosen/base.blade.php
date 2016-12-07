<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="{{ url('assets/img/favicon.ico') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{url('ssets/css/animate.min.css')}}a" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{url('assets/css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{url('assets/css/demo.css')}}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{url('assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
    @yield('addcss')

    <style>
        .text-shadow-black {
            text-shadow: 2px 2px 2px rgba(18, 18, 18, 0.31);
        }
    </style>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="{{ url('w5.jpg') }}">

    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    <i style="padding-right : 30px;" class="fa fa-university"> </i>  Institusi Terpadu
                </a>
            </div>

            <ul class="nav">
                <li class="@yield('activehome')">
                    <a href="{{ url('/dosen') }}">
                        <i class="fa fa-tachometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="@yield('input-presensi')">
                    <a href="{{ url('/dosen/input-presensi') }}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Input Presensi</p>
                    </a>
                </li>
                <li class="@yield('input-nilai')">
                    <a href="{{ url('/dosen/input-nilai') }}">
                        <i class="fa fa-pencil-square-o"></i>
                        <p>Input Nilai</p>
                    </a>
                </li>

                <li class="@yield('jadwal')">
                    <a href="{{ url('/dosen/jadwal') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Jadwal Dosen</p>
                    </a>
                </li>
                <li class="@yield('profile')">
                    <a href="{{ url('/dosen/profile') }}">
                        <i class="fa fa-user "></i>
                        <p>Profile Dosen</p>
                    </a>
                </li>


            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">@yield('nav_position')</a>
                </div>

                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i> @yield('name_account')
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i>Dosen</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Log Out </a></li>
                              </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
            <!-- PUT YOUR CONTENT HERE -->
                @yield('content')
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-left">
                    &copy; 2016 Tubes RPL.inc
                </p>
            </div>
        </footer>

    </div>
</div>




    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" type="text/javascript"></script>
	<script src="{{ url('assets/js/bootstrap.min.js') }} " type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ url('assets/js/bootstrap-checkbox-radio-switch.js') }} "></script>

	<!--  Charts Plugin -->
	<script src="{{ url('assets/js/chartist.min.js') }} "></script>

    <!--  Notifications Plugin    -->
    <script src="{{ url('assets/js/bootstrap-notify.js') }} "></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ url('assets/js/light-bootstrap-dashboard.js') }} "></script>

    @yield('addjs')

</body>
</html>
