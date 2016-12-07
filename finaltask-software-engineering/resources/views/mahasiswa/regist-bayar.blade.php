@extends('mahasiswa/base')

@section('activeregist')
    active
@endsection

@section('title')
    Pembayaran Registrasi - Mahasiswa
@endsection

@section('addcss')
    @endsection

@section('addjs')

@endsection

@section('nav_position')
    Registrasi -> Pembayaran Registrasi
@endsection


@section('name_account')
    {{ $mhs->name }}
@endsection

@section('role_account')
    Mahasiswa
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Input Token Pembayaran</h4>
                </div>
                <div class="content">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <label>Semester</label>
                                    <input name="jurusan" type="text" value="4" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Input Token</label>
                                    <input name="jurusan" type="text" class="form-control" required>
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
                    <h4 class="title">History Pembayaran</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                        <th>Total Pembayaran</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>2014/2015</td>
                            <td>Rp. 7.500.000,-</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2014/2015</td>
                            <td>Rp. 7.500.000,-</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2015/2016</td>
                            <td>Rp. 7.500.000,-</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
