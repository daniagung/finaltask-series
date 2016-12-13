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
                        <th>Kehadiran</th>
                        <th>Tanggal</th>
                        <th>Detail</th>
                        </thead>
                        <tbody>
                        @foreach($listpresensi as $presensi)
                        <tr>
                            <td>{{$presensi->mataKuliah->nama}}</td>
                            <td>{{$presensi->mataKuliah->dosen->name}}</td>
                            <td>{{$presensi->mataKuliah->sks}}</td>
                            <td>{{$presensi->data }}</td>
                            <td>{{$presensi->tanggal }}</td>
                            <td>{{$presensi->keterangan }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
