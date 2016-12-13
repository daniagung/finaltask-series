<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="{{ url('assets/img/favicon.ico') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/animate.min.css')}}a" rel="stylesheet"/>
    <link href="{{url('assets/css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="{{ url('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href='{{ url('bower_components/roboto-fontface/css/roboto/roboto-fontface.css') }}' rel='stylesheet'>
    <link href="{{ url('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
    @yield('addcss')

    <style>
        .text-shadow-black {
            text-shadow: 2px 2px 2px rgba(18, 18, 18, 0.31);
        }
    </style>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red">
    {{--<div class="sidebar" data-color="red" data-image="{{url('w5.jpg')}}">--}}

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
                    <a href="{{ url('/mahasiswa') }}">
                        <i class="fa fa-tachometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="@yield('activeregist')">
                    <a href="{{ url('/mahasiswa/pembayaran') }}">
                        <i class="fa fa-pencil-square-o"></i>
                        <p>Registrasi</p>
                    </a>
                </li>

                <li class="@yield('activejadwal')">
                    <a href="{{ url('/mahasiswa/jadwal') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Jadwal</p>
                    </a>
                </li>
                <li class="@yield('activepresensi')">
                    <a href="{{ url('/mahasiswa/presensi') }}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Presensi</p>
                    </a>
                </li>
                <li class="@yield('activenilai')">
                    <a href="{{ url('/mahasiswa/nilai') }}">
                        <i class="fa fa-bar-chart "></i>
                        <p>Nilai</p>
                    </a>
                </li>
                <li class="@yield('activeprofile')">
                    <a href="{{ url('/mahasiswa/profile') }}">
                        <i class="fa fa-user "></i>
                        <p>Profile</p>
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
                                    <i class="fa fa-user"></i> {{ Auth::guard('mahasiswa')->user()->name }}
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i> Mahasiswa </a></li>
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
                    &copy; 2016 Tubes IMPAL.inc
                </p>
            </div>
        </footer>

    </div>
</div>




    <!--   Core JS Files   -->
    <script src="{{ url('assets/js/jquery-1.10.2.js') }} " type="text/javascript"></script>
	<script src="{{ url('assets/js/bootstrap.min.js') }} " type="text/javascript"></script>
	<script src="{{ url('assets/js/bootstrap-checkbox-radio-switch.js') }} "></script>
	<script src="{{ url('assets/js/chartist.min.js') }} "></script>
    <script src="{{ url('assets/js/bootstrap-notify.js') }} "></script>


    @yield('addjs')

</body>
</html>
