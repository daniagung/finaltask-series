@extends('admin/base')

@section('activeprofile')
    active
@endsection

@section('title')
    Profile - Admin Akademik
@endsection

@section('addcss')
    @endsection

@section('addjs')

@endsection

@section('nav_position')
    Profile
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Profile</h4>
                </div>
                <div class="content">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username (disabled)</label>
                                    {{ csrf_field() }}
                                    <input name="id" type="hidden" class="form-control" value="{{ $user->id }}">

                                    <input name="username" type="text" class="form-control" value="{{ $user->username }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Optional">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    {{--<img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>--}}
                </div>
                <div class="content">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="{{url('assets/img/default-avatar.png')}}" alt="..."/>

                            <h4 class="title">{{$user->name}}<br />
                            </h4>
                        </a>
                        <br>
                    </div>
                    <p class="description text-center">Badan Administrasi Akademik<br>
                        Institusi Terpadu
                    </p>
                </div>
                <hr>
            </div>
        </div>
    </div>

@endsection
