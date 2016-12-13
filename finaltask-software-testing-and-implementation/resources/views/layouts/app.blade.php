<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{ url('assets/img/favicon.ico') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>S.I.A Sistem Informasi Akademik</title>

    <!-- Styles -->
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ url('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href='{{ url('bower_components/roboto-fontface/css/roboto/roboto-fontface.css') }}' rel='stylesheet'>

    <style>
        .navbar , .panel-heading {
            background-color: white;
            border-bottom-color: rgba(0, 0, 0, 0.23);
            border-bottom-style: inset;
            border-bottom-width: 1px;
        }
        body {
            font-family: 'Lato';
            background-image: url('{{url('w5.jpg')}}');
            background-color: rgb(247, 247, 248);
        }

        .fa-btn {
            margin-right: 6px;
        }

        .text-shadow-black {
            color: white !important;
            text-shadow: 2px 2px 2px rgba(18, 18, 18, 0.64);
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    S. I. A (MANEH!!)
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                {{--<ul class="nav navbar-nav">--}}
                    {{--<li><a href="{{ url('/home') }}">Home</a></li>--}}
                {{--</ul>--}}

                {{--<ul class="nav navbar-nav">--}}
                    {{--<li><a href="{{ url('/quote/timeline') }}">Timeline</a></li>--}}
                {{--</ul>--}}

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guard('mahasiswa')->check() || Auth::guard('admin_akademik')->check() || Auth::guard('dosen')->check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                @if (Auth::guard('mahasiswa')->check())
                                    {{ Auth::guard('mahasiswa')->user()->name }}<span class="caret"></span>
                                @elseif(Auth::guard('admin_akademik')->check())
                                    {{ Auth::guard('admin_akademik')->user()->name }}<span class="caret"></span>
                                @elseif(Auth::guard('dosen')->check())
                                    {{ Auth::guard('dosen')->user()->name }}<span class="caret"></span>
                                @endif
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{ url('assets/js/jquery-1.10.2.js') }} " type="text/javascript"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }} " type="text/javascript"></script>

</body>
</html>
