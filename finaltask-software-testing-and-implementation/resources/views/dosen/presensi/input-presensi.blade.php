@extends('dosen/base')

@section('input-presensi')
    active
@endsection

@section('title')
    Input Presensi - Dosen
@endsection

@section('addcss')
    @endsection

@section('nav_position')
    Input Presensi
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Input Presensi</h4>
                </div>
                <div class="content">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nama Mata Kuliah</label>
                                    {{ csrf_field() }}
                                    <select class="form-control" required name="matkul_id">
                                        <option selected="selected" disabled>Pilih MataKuliah</option>
                                        @foreach($list_matkul as $matkul)
                                            <option value="{{ $matkul->id }}">{{ $matkul->kelas->kode }} | {{ $matkul->nama }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-info btn-fill ">Select</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">List Presensi</h4>
                </div>
                <div class="content">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>MataKuliah</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    {{--<th>Action</th>--}}
                                </thead>
                                <tbody>
                                <?php $i = 1 ?>
                                @foreach($list_presensi as $presensi)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $presensi->nama }}</td>
                                        <td>{{ $presensi->tanggal }}</td>
                                        <td>{{ $presensi->keterangan }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
