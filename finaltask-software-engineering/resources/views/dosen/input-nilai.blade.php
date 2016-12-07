@extends('dosen/base')

@section('input-nilai')
    active
@endsection

@section('title')
    Input Nilai - Dosen
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


    </script>

@endsection

@section('nav_position')
    Input Nilai
@endsection


@section('name_account')
    {{ $user->name }}
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
                                        <optgroup label="Matematika Diskrit - IF-38-01">
                                            <option value="1">1301140151 | Fachri Ul Albab</option>
                                            <option value="2">1301140171 | Dede Kiswanto</option>
                                            <option value="3">1301140181 | Rizkiyana Prima P</option>
                                            <option value="4">1301140201 | Ferawidya Primadevi</option>
                                        </optgroup>
                                        <optgroup label="Struktur Data - IF-38-02">
                                            <option value="8">1301140122 | Badrun</option>
                                            <option value="6">1301140122 | John</option>
                                        </optgroup>
                                        <optgroup label="Kalkulus - SI-38-01">
                                            <option value="5">1301140191 | S.E.N.D.I.R.I</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>UTS</label>
                                    <input name="kelas" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>UAS</label>
                                    <input name="jurusan" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Quiz</label>
                                    <input name="fakultas" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label >Tugas</label>
                                    <input name="fakultas" type="text" class="form-control" required>
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
