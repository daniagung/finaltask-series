@extends('admin/base')

@section('activejadwal')
    active
@endsection

@section('title')
    Input Jadwal - Admin Akademik
@endsection

@section('addcss')
    <link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.min.css')}}" />
@endsection

@section('addjs')
    <script src="{{url('assets/js/bootstrap-selectsplitter.min.js')}}"></script>
    <script src="{{url('bower_components/moment/min/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script type="text/javascript">

            $('select[data-selectsplitter-selector]').selectsplitter();

            var default_day = moment("2016-01-01");

            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format : 'dddd HH:MM',
                    defaultDate: default_day,
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
    Input Jadwal
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Input Jadwal</h4>
            </div>
            <div class="content">
                <form method="post" action="">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                {{ csrf_field() }}
                                <select name="kelas" class="form-control" data-selectsplitter-selector>
                                    @foreach($list_kelas as $kelas)
                                    <optgroup label="{{ $kelas->kode }}">
                                        @foreach($kelas->mataKuliah as $matkul)
                                            @if($matkul->jadwal == null)
                                                <option value="{{ $matkul->id }}">{{ $matkul->nama }} - {{ $matkul->dosen->kode }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-5">
                            {{--<div class="form-group">--}}
                                {{--<label>Insert Jadwal</label>--}}
                                {{--<div class='date input-group' id='datetimepicker1'>--}}
                                    {{--<input name="ttl" type='text' class="form-control" required/>--}}
                                    {{--<span class="input-group-addon">--}}
                                    {{--<span class="fa fa-calendar"></span>--}}
                                {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label>Pilih Hari</label>
                                <select class="form-control" required name="hari">
                                    <option selected="selected" disabled>Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jum'at">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pilih Jam</label>
                                <select class="form-control" required name="jam">
                                    <option selected="selected" disabled>Pilih Jam</option>
                                    <option value="08:00">08:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="16:00">16:00</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ruangan</label>
                                <input name="ruangan" type="text" class="form-control" required>
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
                    <h4 class="title">Daftar Jadwal</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                            <th>Kelas</th>
                            <th>Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Waktu</th>
                            <th>Ruangan</th>
                        </thead>
                        <tbody>
                        @foreach($list_jadwal as $jadwal)
                            <tr>
                                <td>{{ $jadwal->mataKuliah->kelas->kode }}</td>
                                <td>{{ $jadwal->mataKuliah->nama }}</td>
                                <td>{{ $jadwal->mataKuliah->dosen->name }}</td>
                                <td>{{ $jadwal->hari }} {{ $jadwal->waktu }}</td>
                                <td>{{ $jadwal->ruangan }}</td>
                                <td>
                                    <a class="btn btn-danger" href="{{ url('admin/delete-jadwal') }}/{{$jadwal->id}}">Delete</a>
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
