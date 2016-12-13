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
                        @if(Auth::guard('mahasiswa')->user()->kelas != null)
                            @foreach(Auth::user()->kelas->mataKuliah as $matkul)
                                <tr>
                                    <td>{{ $matkul->nama }}</td>
                                    <td>{{ $matkul->dosen->kode }}</td>
                                    @if($matkul->jadwal == null)
                                        <td>BELUM TERJADWAL</td>
                                        <td>BELUM TERJADWAL</td>

                                    @else
                                        <td>{{ $matkul->jadwal->hari }} {{ $matkul->jadwal->waktu }}</td>
                                        <td>{{ $matkul->jadwal->ruangan }}</td>

                                    @endif
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
