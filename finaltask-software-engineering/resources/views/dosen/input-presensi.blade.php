@extends('dosen/base')

@section('input-presensi')
    active
@endsection

@section('title')
    Input Presensi - Dosen
@endsection

@section('addcss')
    @endsection

@section('addjs')
    <script src="assets/js/chartist.min.js"></script>
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/light-bootstrap-dashboard.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            demo.initChartist();
        });
    </script>
@endsection

@section('nav_position')
    Input Presensi
@endsection


@section('name_account')
    {{ $user->name }}
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Mata Kuliah</label>
                                    {{ csrf_field() }}
                                    <select class="form-control" required>
                                        <option selected="selected" disabled>Pilih MataKuliah</option>
                                        <option>Matematika Diskrit IF-38-01</option>
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
                    <h4 class="title">Daftar Mahasiswa</h4>
                </div>
                <div class="content">
                    <form>
                        <div class="table table-responsive">
                            <table class="table">
                                <thead>
                                <th>Kehadiran</th>
                                <th>Nama</th>
                                <th>Nim</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" aria-label="..."></td>
                                    <td class="">Fachri Ul Albab </td>
                                    <td class="">1301140151</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" aria-label="..."></td>
                                    <td class="">Dede Kiswanto </td>
                                    <td class="">1301140171</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" aria-label="..."></td>
                                    <td class="">Rizkiyana Prima P </td>
                                    <td class="">1301140181</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" aria-label="..."></td>
                                    <td class="">Ferawidya Primadevi </td>
                                    <td class="">1301140201</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill ">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
