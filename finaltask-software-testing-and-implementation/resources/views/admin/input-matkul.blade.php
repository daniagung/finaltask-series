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

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Input Mata Kuliah</h4>
                </div>
                <div class="content">
                    <form method="post" action="{{ url('admin/input-matkul') }}">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    {{ csrf_field() }}
                                    <select class="form-control" required name="kelas">
                                        <option selected="selected" disabled>Pilih kelas</option>
                                        @foreach($list_kelas as $kelas)
                                            <option value="{{ $kelas->id }}">{{ $kelas->kode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Nama Mata Kuliah</label>
                                    <input name="mata_kuliah" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Kode</label>
                                    <input name="kode" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>SKS</label>
                                    <input name="sks" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dosen</label>
                                    <select class="form-control" required name="dosen">
                                        <option selected="selected" disabled>Pilih dosen</option>
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
                        @foreach($list_matkul as $matkul)
                            <tr>
                                <td>{{ $matkul->kelas->kode }}</td>
                                <td>{{ $matkul->nama }}</td>
                                <td>{{ $matkul->dosen->name }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ url('admin/edit-matkul') }}/{{$matkul->id}}">Edit</a>
                                    <a class="btn btn-danger" href="{{ url('admin/delete-matkul') }}/{{$matkul->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
