@extends('dosen/base')

@section('jadwal')
    active
@endsection

@section('title')
    Jadwal - Dosen
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
    Jadwal
@endsection


@section('name_account')
    {{ $user->name }}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Jadwal Dosen</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Mata Kuliah</th>
                        <th>Kelas</th>
                        <th>Ruangan</th>
                        <th>Hari / Jam</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Matematika Diskrit</td>
                            <td>IF-38-01</td>
                            <td>A208B</td>
                            <td>Senin / 10.30 - 12.30</td>
                        </tr>
                        <tr>
                            <td>Kalkulus II</td>
                            <td>IF-39-02</td>
                            <td>B308B</td>
                            <td>Jumat / 12.30 - 14.30</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
