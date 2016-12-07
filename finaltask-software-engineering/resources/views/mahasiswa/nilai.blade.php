@extends('mahasiswa/base')

@section('activenilai')
    active
@endsection

@section('title')
    Nilai - Mahasiswa
@endsection

@section('addcss')
    @endsection

@section('addjs')

@endsection

@section('nav_position')
    Nilai
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
                    <h4 class="title">Nilai Matakuliah</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>SKS</th>
                        <th>Indeks</th>
                        <th>Detail</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Matematika Diskrit</td>
                            <td>Bambang Ari Wahyudi</td>
                            <td>3</td>
                            <td>A</td>
                            <td><a class="btn btn-sm btn-primary">Detail</a></td>
                        </tr>
                        <tr>
                            <td>Kalkulus II</td>
                            <td>Azikin</td>
                            <td>4</td>
                            <td>C</td>
                            <td><a class="btn btn-sm btn-primary">Detail</a></td>

                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
