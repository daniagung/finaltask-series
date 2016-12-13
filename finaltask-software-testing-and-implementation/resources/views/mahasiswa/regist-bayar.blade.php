@extends('mahasiswa/base')

@section('activeregist')
    active
@endsection

@section('title')
    Pembayaran Registrasi - Mahasiswa
@endsection

@section('addcss')
    @endsection

@section('addjs')

@endsection

@section('nav_position')
    Registrasi -> Pembayaran Registrasi
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Input Token Pembayaran</h4>
                </div>
                <div class="content">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <label>Semester</label>
                                    <input name="semester" type="text" value="{{ count($tokens) + 1 }}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Input Token</label>
                                    <input name="token" type="text" class="form-control" required>
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
                    <h4 class="title">History Pembayaran</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Semester</th>
                        <th>Status</th>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        @foreach($tokens as $token)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>Sudah Bayar</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
