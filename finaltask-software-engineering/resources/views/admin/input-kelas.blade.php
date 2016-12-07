@extends('admin/base')

@section('activekelas')
    active
@endsection

@section('title')
    Input Kelas - Admin Akademik
@endsection

@section('addcss')
    @endsection

@section('addjs')

@endsection

@section('nav_position')
    Input Kelas
@endsection


@section('name_account')
    {{ $user->name }}
@endsection

@section('role_account')
    Admin Akademik
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Input Kelas</h4>
                </div>
                <div class="content">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    {{ csrf_field() }}
                                    <input name="kelas" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <input name="jurusan" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >Fakultas</label>
                                    <input name="fakultas" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-info btn-fill ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Daftar Kelas</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Fakultas</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>IF-38-01</td>
                            <td>Teknik Informatika</td>
                            <td>Fakultas Informatika</td>
                        </tr>
                        <tr>
                            <td>IF-38-02</td>
                            <td>Teknik Informatika</td>
                            <td>Fakultas Informatika</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
