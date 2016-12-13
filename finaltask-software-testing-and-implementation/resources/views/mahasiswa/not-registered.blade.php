@extends('mahasiswa/base')

@section('activehome')
    active
@endsection

@section('title')
    Home - Mahasiswa
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
    Home
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="header">
                    <h4 class="title">ANDA BELUM MELAKUKAN REGISTRASI</h4>
                </div>
                <div class="content">
                    <div class="footer">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
