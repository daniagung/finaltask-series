@extends('admin/base')

@section('activedosen')
    active
@endsection

@section('title')
    Edit Dosen - Admin Akademik
@endsection

@section('nav_position')
    Edit Dosen
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title">Edit Dosen</h4>
				</div>
				<div class="content">
					<form action="{{ url('admin/edit-dsn') }}/{{ $dosen->id }}" method="post">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label>Nama</label>
									<input name="nama" type="text" class="form-control" value="{{ $dosen->name }}" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>NIP</label>
									<input name="nip" type="text" class="form-control" value="{{ $dosen->nip }}" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Kode Dosen</label>
									<input name="kode" type="text" class="form-control" value="{{ $dosen->kode }}" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div  class="form-group">
									<label>Username</label>
									<input name="username" type="text" class="form-control" value="{{ $dosen->username }}" required>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>Password</label>
									<input name="password" type="text" class="form-control" placeholder="Optional">
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
