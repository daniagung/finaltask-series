@extends('admin/base')

@section('activematkul')
    active
@endsection

@section('title')
    Edit Mata Kuliah - Admin Akademik
@endsection

@section('addcss')
    @endsection

@section('addjs')
@endsection

@section('nav_position')
    Edit Mata Kuliah
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Mata Kuliah</h4>
                </div>
                <div class="content">
                    <form method="post" action="{{ url('admin/edit-matkul') }}/{{ $matkul->id }}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    {{ csrf_field() }}
                                    <select class="form-control" required name="kelas">
                                        <option selected="selected" value="{{ $matkul->kelas_id }}">{{ $matkul->kelas->kode }}</option>
                                        @foreach($list_kelas as $kelas)
                                            <option value="{{ $kelas->id }}">{{ $kelas->kode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Mata Kuliah</label>
                                    <input name="mata_kuliah" type="text" class="form-control" value="{{ $matkul->nama }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>SKS</label>
                                    <input name="sks" type="text" class="form-control" value="{{ $matkul->sks }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kode</label>
                                    <input name="kode" type="text" class="form-control" value="{{ $matkul->kode }}" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Dosen</label>
                                    <select class="form-control" required name="dosen">
                                        <option selected="selected" value="{{ $matkul->dosen_id }}">{{ $matkul->dosen->name }} - {{ $matkul->dosen->kode }}</option>
                                        @foreach($list_dosen as $dosen)
                                            <option value="{{ $dosen->id }}">{{ $dosen->name }} - {{ $dosen->kode }}</option>
                                        @endforeach
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
@endsection
