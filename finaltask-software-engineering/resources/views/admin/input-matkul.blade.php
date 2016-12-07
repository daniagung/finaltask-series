@extends('admin/base')

@section('activematkul')
    active
@endsection

@section('title')
    Input Mata Kuliah - Admin Akademik
@endsection

@section('addcss')
    @endsection

@section('addjs')
@endsection

@section('nav_position')
    Input Mata Kuliah
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
                    <h4 class="title">Input Mata Kuliah</h4>
                </div>
                <div class="content">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    {{ csrf_field() }}
                                    <select class="form-control" required>
                                        <option selected="selected" disabled>Pilih kelas</option>
                                        <option>IF-38-01</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Mata Kuliah</label>
                                    <input name="jurusan" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dosen</label>
                                    <select class="form-control" required>
                                        <option selected="selected" disabled>Pilih dosen</option>
                                        <option>Bambang Ari Wahyudi - BBD</option>
                                    </select>
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
                    <h4 class="title">Daftar Mata Kuliah</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Kelas</th>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>IF-38-01</td>
                            <td>Machine Learning</td>
                            <td>Bambang Ari Wahyudi</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
