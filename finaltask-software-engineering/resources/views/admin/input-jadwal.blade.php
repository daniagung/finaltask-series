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
    <script type="text/javascript" src="http://momentjs.com/downloads/moment.js"></script>
    <script type="text/javascript" src="{{url('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script type="text/javascript">

            $('select[data-selectsplitter-selector]').selectsplitter();

            var default_day = moment("2016-01-01");

            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format : 'MM-DD-YYYY HH:MM',
                    defaultDate: default_day,
                });
            });

    </script>

@endsection

@section('nav_position')
    Input Jadwal
@endsection


@section('name_account')
    {{ $user->name }}
@endsection

@section('role_account')
    Admin Akademik
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Input Mata Kuliah</h4>
            </div>
            <div class="content">
                <form method="post" action="">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                {{ csrf_field() }}
                                <select class="form-control" data-selectsplitter-selector>
                                    <optgroup label="IF-38-01">
                                        <option value="1">Matematika Diskrit - BBD</option>
                                        <option value="1">Algoritma Struktur Data - GIA</option>
                                    </optgroup>
                                    <optgroup label="IF-38-02">
                                        <option value="1">Matematika Diskrit - BBD</option>
                                    </optgroup>
                                    <optgroup label="SI-38-01">
                                        <option value="1">Sistem Oprasi - KKK</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Insert Jadwal</label>
                                <div class='date input-group' id='datetimepicker1'>
                                    <input name="ttl" type='text' class="form-control" required/>
                                    <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                                </div>
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
