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
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>KUIS</th>
                        <th>Tugas</th>
                        </thead>
                        <tbody>
                         @foreach($list_nilai as $nilai)
                            <tr>
                                <td>{{$nilai->mataKuliah->nama}} ({{$nilai->mataKuliah->kode}})</td>
                                <td>{{$nilai->mataKuliah->dosen->name}} ({{$nilai->mataKuliah->dosen->kode}})</td>
                                <td>{{$nilai->mataKuliah->sks}}</td>
                                <td>{{$nilai->getIndex()}}</td>
                                <td>{{$nilai->uts}}</td>
                                <td>{{$nilai->uas}}</td>
                                <td>{{$nilai->quiz}}</td>
                                <td>{{$nilai->tugas}}</td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
