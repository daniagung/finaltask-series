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

    <script type="text/javascript">
        $('select[data-selectsplitter-selector]').selectsplitter();

        function submitNilai(){

            var mhs_id = $('#mahasiswa_id').val();
            var matkul_id = $('select option:selected').attr('matkul_id');

            $('#matkul_id').val(matkul_id);

            var uts = $('#uts').val();
            var uas = $('#uas').val();
            var quiz = $('#quiz').val();
            var tugas = $('#tugas').val();

            console.log([uts,uas,quiz,tugas, mhs_id]);

            if(uts != "" && uas != "" && quiz != "" && tugas != ""){
                if(mhs_id != "" && matkul_id != "")
                    $('#form-nilai').submit();
                else
                    alert("Form Masih Kosong");
            } else {
                alert("Form Masih Kosong");
            }


        }
    </script>

@endsection

@section('nav_position')
    Input Nilai
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Input Mata Kuliah</h4>
                </div>
                <div class="content">
                    <form id="form-nilai" method="post" action="">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="matkul_id" id="matkul_id">
                                    <select class="form-control" data-selectsplitter-selector name="mahasiswa_id" id="mahasiswa_id">
                                        @foreach($list_matkul as $matkul)
                                        <optgroup label="{{ $matkul->nama }} - {{ $matkul->kelas->kode }}">
                                            @foreach($matkul->kelas->mahasiswa as $mhs)
                                            <option matkul_id="{{ $matkul->id }}" value="{{ $mhs->id }}">{{ $mhs->nim }} | {{ $mhs->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>UTS (35%)</label>
                                    <input id="uts" name="uts" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>UAS (35%)</label>
                                    <input id="uas" name="uas" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Quiz (20%)</label>
                                    <input id="quiz" name="quiz" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tugas (10%)</label>
                                    <input id="tugas" name="tugas" type="number" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <button type="button" onclick="submitNilai()" class="btn btn-info btn-fill ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Daftar Nilai</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Mata Kuliah</th>
                        <th>Indeks</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($list_matkul as $matkul)
                                @foreach($matkul->nilai as $nilai)

                                    <tr>
                                    <td>{{ $nilai->mahasiswa->name }}</td>
                                    <td>{{ $matkul->kelas->kode }}</td>
                                    <td>{{ $matkul->kode }}</td>
                                    <td>{{ $nilai->getIndex() }}</td>
                                    <td>
                                        <a class="btn btn-danger" href="{{ url('dosen/input-nilai/delete') }}/{{ $nilai->id }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
