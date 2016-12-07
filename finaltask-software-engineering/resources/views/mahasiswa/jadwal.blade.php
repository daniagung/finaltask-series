@extends('mahasiswa/base')

@section('activejadwal')
    active
@endsection

@section('title')
    Jadwal - Mahasiswa
@endsection

@section('addcss')
    @endsection

@section('addjs')

@endsection

@section('nav_position')
    Jadwal
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
                    <h4 class="title">Jadwal Kuliah</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>Hari / Jam</th>
                        <th>Ruang</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Matematika Diskrit</td>
                            <td>Bambang Ari Wahyudi</td>
                            <td>Senin / 18.30 - 20.30</td>
                            <td>KU3.01.10</td>
                        </tr>
                        <tr>
                            <td>Kalkulus II</td>
                            <td>Azikin</td>
                            <td>Senin / 18.30 - 20.30</td>
                            <td>KU3.01.10</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
