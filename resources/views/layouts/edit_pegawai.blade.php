@extends('master_layout.master')

@section('title','Edit Pegawai')


@section('content')
<form action="/pegawai/UpdatePegawai/{{ $data->id }}" method="post">
	{{ method_field('patch') }}
<div class="row">
	<div class="col-md-10 offset-md-1">
		<div class="card card-default" style="margin-top:5%">
			<div class="card-header">
				<h3>Edit Pegawai <span class="fa fa-user"></span></h3>
			</div>
			<div class="card-body">
				<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="name" value="{{ $data->nama_user }}" placeholder="" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required="" required="">
						@if ($errors->has('name'))
							<div class="invalid-feedback">
								{{ $errors->first('name') }}
							</div>
						@endif
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">No Telp</label>
						<input type="number" name="no_telp" value="{{ $data->no_telp }}" placeholder="" required="" class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}">
						@if ($errors->has('no_telp'))
							<div class="invalid-feedback">
								{{ $errors->first('no_telp') }}
							</div>
						@endif
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" name="email" value="{{ $data->email }}" placeholder="" required="" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" autocomplete="off" required="">
						@if ($errors->has('no_telp'))
							<span class="invalid-feedback">
								{{ $errors->first('no_telp') }}
							</span>
						@endif
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Level</label>
						<input type="text" name="level" value="{{ $data->level }}" placeholder="" required="" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" readonly="" required="">
						@if ($errors->has('level'))
							<div class="invalid-feedback">
								{{ $errors->first('level') }}
							</div>
						@endif
					</div>
				</div>
				</div>
			</div>
			<div class="card-footer">
					{{ csrf_field() }}
				<button type="submit" class="btn btn-success">Update <span class="fa fa-pencil"></span></button>
			</div>
		</div>
	</div>
</div>
</form>

@endsection