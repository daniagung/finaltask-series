@extends('mahasiswa/base')

@section('activepresensi')
    active
@endsection

@section('title')
    Presensi - Mahasiswa
@endsection

@section('addcss')
    @endsection

@section('addjs')

@endsection

@section('nav_position')
    Presensi
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
                    <h4 class="title">Presensi Kehadiran</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>SKS</th>
                        <th>Presentase Kehadiran</th>
                        <th>Detail</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Matematika Diskrit</td>
                            <td>Bambang Ari Wahyudi</td>
                            <td>3</td>
                            <td>90%</td>
                            <td><a class="btn btn-sm btn-primary">Detail</a></td>
                        </tr>
                        <tr>
                            <td>Kalkulus II</td>
                            <td>Azikin</td>
                            <td>4</td>
                            <td>88%</td>
                            <td><a class="btn btn-sm btn-primary">Detail</a></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
