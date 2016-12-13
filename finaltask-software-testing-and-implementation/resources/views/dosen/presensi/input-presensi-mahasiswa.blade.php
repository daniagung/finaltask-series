@extends('dosen/base')

@section('input-presensi')
    active
@endsection

@section('title')
    Input Presensi - Dosen
@endsection


@section('addcss')
    <link rel="stylesheet" href="{{ url('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />
@endsection

@section('addjs')

    <script src="{{ url('bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function () {
            $('#datetimepicker1').datetimepicker({
                icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-calendar-check-o',
                    clear: 'fa fa-trash-o',
                    close: 'fa fa-close'
                }
            });
        });
    </script>

@endsection


@section('nav_position')
    Input Presensi > Presensi Mahasiswa
@endsection

@section('content')

    <form action="" method="post">
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Input Data Presensi</h4>
                </div>
                <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Tanggal Presensi</label>
                                    <input id='datetimepicker1' name="tanggal_kelas" type='text' class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Keterangan Presensi</label>
                                    <input name="keterangan" type='text' class="form-control" placeholder="Keterangan" required/>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Daftar Mahasiswa</h4>
                </div>
                <div class="content">
                        <div class="table table-responsive">
                            <table class="table">
                                <thead>
                                <th style="width: 100px;">Kehadiran</th>
                                <th style="text-align: center">Nama</th>
                                <th>Nim</th>
                                </thead>
                                <tbody>
                                @foreach($list_mahasiswa as $mahasiswa)
                                <tr>
                                    <td>
                                    <select name="presensi[]" class="form-control">
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alpha">Alpha</option>
                                    </select>
                                    </td>
                                    <td style="text-align: center">{{ $mahasiswa->name }}</td>
                                    <td class="">{{ $mahasiswa->nim }}</td>
                                    <input type="number" style="display: none" value="{{ $mahasiswa->id }}" name="mahasiswa[]">
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill ">Submit</button>

                </div>
            </div>
        </div>
    </div>

    </form>


@endsection
