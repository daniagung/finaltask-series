@extends('admin/base')

@section('activedosen')
    active
@endsection

@section('title')
    Input Dosen - Admin Akademik
@endsection

@section('nav_position')
    Input Dosen
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title">Input Dosen</h4>
				</div>
				<div class="content">
					<form action="{{ url('admin/input-dosen') }}" method="post">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label>Nama</label>
									<input name="nama" type="text" class="form-control" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>NIP</label>
									<input name="nip" type="text" class="form-control" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Kode Dosen</label>
									<input name="kode" type="text" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div  class="form-group">
									<label>Username</label>
									<input name="username" type="text" class="form-control" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Password</label>
									<input name="password" type="text" class="form-control" required>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Daftar Dosen</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Kode Dosen</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($list_dosen as $dosen)
                        <tr>
                            <td>{{$dosen->name}}</td>
                            <td>{{$dosen->nip}}</td>
                            <td>{{$dosen->kode}}</td>
                            <td>
                            	<a class="btn btn-primary" href="{{ url('admin/edit-dsn') }}/{{ $dosen->id }}">Edit</a>
                            	<a class="btn btn-danger" href="{{ url('admin/delete-dsn') }}/{{ $dosen->id }}">Delete</a>
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
