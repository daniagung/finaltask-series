@extends('admin/base')

@section('activemahasiswa')
    active
@endsection

@section('title')
    Input Mahasiswa - Admin Akademik
@endsection

@section('nav_position')
    Input Mahasiswa
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title">Input Mahasiswa</h4>
				</div>
				<div class="content">
					<form action="{{ url('admin/input-mahasiswa') }}" method="post">
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
									<label>NIM</label>
									<input name="nim" type="text" class="form-control" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">	
									<label>Kelas</label>
									<select name="kelas" class="form-control" required>
				                        <option selected="selected" disabled>Pilih kelas</option>
				                        @foreach($list_kelas as $kelas)
				                            <option value="{{ $kelas->id }}">{{ $kelas->kode }}</option>
				                        @endforeach
				                    </select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label>Alamat</label>
									<input name="alamat" type="text" class="form-control" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>No.Telp/HP</label>
									<input name="telp" type="text" class="form-control" required>
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
                    <h4 class="title">Daftar Mahasiswa</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($list_mahasiswa as $mahasiswa)
                        <tr>
                        	<td>{{$mahasiswa->name}}</td>
                        	<td>{{$mahasiswa->nim}}</td>
                        	@if ($mahasiswa->kelas != null)
                        		<td>{{$mahasiswa->kelas->kode}}</td>
                        	@else
                        		<td>Tidak ada kelas</td>
                        	@endif
                        	<td>{{$mahasiswa->alamat}}</td>
                        	<td>{{$mahasiswa->no_telp}}</td>
                        	<td>
	                    		<a class="btn btn-primary" href="{{ url('admin/edit-mhs') }}/{{$mahasiswa->id}}">Edit</a>
	                    		<a class="btn btn-danger" href="{{ url('admin/delete-mhs') }}/{{$mahasiswa->id}}">Delete</a>
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
