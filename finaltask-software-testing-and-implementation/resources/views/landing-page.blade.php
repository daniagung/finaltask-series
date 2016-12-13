@extends('layouts.app')

@section('content')
<div class="container" style="">
    <div class="row">

        <div class="col-md-6">
            <div class="jumbotron" style="background-color: transparent">
                <h1 >Sistem Informasi Akademik!</h1>
                <p ><strong>Welcome to centralized information system academic</strong></p>
                <p ><a class="btn btn-primary btn-lg" href="#" role="button">Selengkapnya</a></p>
            </div>
        </div>


        @if (Auth::guard('mahasiswa')->check() || Auth::guard('admin_akademik')->check() || Auth::guard('dosen')->check())
            <div class="col-md-6" style="padding-top: 100px">
                <div class="panel panel-default" >
                    <div class="panel-heading">Your Account</div>
                    <div class="panel-body">
                        @if (Auth::guard('mahasiswa')->check())
                            <p>Selamat Datang, <strong>{{ Auth::guard('mahasiswa')->user()->name }}</strong></p>
                            <a href="{{ url('/mahasiswa') }}"><i class="fa fa-btn fa-tachometer"></i>Go to Dasboard Mahasiswa</a>
                            <br><br>

                        @elseif(Auth::guard('admin_akademik')->check())
                            <p>Selamat Datang, <strong>{{ Auth::guard('admin_akademik')->user()->name }}</strong></p>
                            <a href="{{ url('/admin') }}"><i class="fa fa-btn fa-tachometer"></i>Go to Dasboard Admin Akademik</a>
                            <br><br>

                        @elseif(Auth::guard('dosen')->check())
                            <p>Selamat Datang, <strong>{{ Auth::guard('dosen')->user()->name }}</strong></p>
                            <a href="{{ url('/dosen') }}"><i class="fa fa-btn fa-tachometer"></i>Go to Dasboard Dosen</a>
                            <br><br>

                        @endif
                        <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </div>
                </div>
            </div>

        @else
            <div class="col-md-6" style="padding-top: 100px">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="form-group" >--}}
                                {{--<label class="col-md-4 control-label">Role</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<select name="role" class="form-control" required>--}}
                                        {{--<option selected="selected" disabled>Please select role</option>--}}
                                        {{--<option value="mahasiswa">Mahasiswa</option>--}}
                                        {{--<option value="dosen">Dosen</option>--}}
                                        {{--<option value="admin">Administrasi Akademik</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>Login
                                    </button>

                                    <a class="btn btn-link" href="#">Lupa Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endif

    </div>
</div>
@endsection
