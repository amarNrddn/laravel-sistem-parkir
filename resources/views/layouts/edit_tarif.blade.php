@extends('master_layout.master')


@section('title','Edit Tarif')

@section('content')
<form action="/tarif/UpdateTarif/{{ $data->id }}" method="post">
	{{ method_field('patch') }}
<div class="row">
	<div class="col-md-6 offset-md-3">
		<br><br><br>
		<div class="card card-default">
			<div class="card-header">
				<h3>Edit Tarif</h3>
			</div>
			<div class="card-body">
		<div class="col-md-12">
			<div class="form-group">
				<label for="">Id Tarif</label>
				<input type="text" name="id" value="{{ $data->id }}" placeholder="" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" readonly="">
				@if ($errors->has('id'))
					<span class="invalid-feedback">
						{{ $errors->first('id') }}
					</span>
				@endif
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="">Jenis Kendaraan</label>
				<input type="text" name="jenis_kendaraan" value="{{ $data->jenis_kendaraan }}" placeholder="" class="form-control{{ $errors->has('jenis_kendaraan') ? ' is-invalid' : '' }}" autocomplete="off">
				@if ($errors->has('id'))
					<span class="invalid-feedback">
						{{ $errors->first('id') }}
					</span>
				@endif
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="">Tarif</label>
				<input type="number" name="tarif" value="{{ $data->tarif }}" placeholder="" class="form-control{{ $errors->has('tarif') ? ' is-invalid' : '' }}" autocomplete="off">
				@if ($errors->has('id'))
					<span class="invalid-feedback">
						{{ $errors->first('id') }}
					</span>
				@endif
			</div>
		</div>
		<div class="col-md-12">
			{{ csrf_field() }}

			<button type="submit" class="btn btn-outline-success btn-block" name="update">Update <span class="fa fa-pencil"></span></button>
		</div>
			</div>
		</div>
	</div>
</div>
</form>

@endsection