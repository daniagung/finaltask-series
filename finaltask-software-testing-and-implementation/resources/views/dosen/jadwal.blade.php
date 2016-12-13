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
                        @foreach($list_matkul as $matkul)
                        <tr>
                            <td>{{ $matkul->nama }}</td>
                            <td>{{ $matkul->kelas->kode }}</td>
                            @if($matkul->jadwal)
                                <td>{{ $matkul->jadwal->ruangan }}</td>
                                <td>{{ $matkul->jadwal->hari }} {{ $matkul->jadwal->waktu }}</td>
                            @else
                                <td>BELUM TERJADWAL</td>
                                <td>BELUM TERJADWAL</td>
                            @endif

                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
