@extends('master_layout.master')


@section('title','Data Kelola Tarif')


@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">
		<br><br>
		@if (session('message'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h3>Success <span class="fa fa-check"></span></h3>
				<hr style="margin-top:-0.6%">
				{{ session('message') }}
				<button type="button" class="close" data-dismiss="alert">
					<span>&times;</span>
				</button>
			</div>
		@endif
		{{-- @if (count($errors) > 0)
			@foreach ($errors->all() as $error)
				<div class="alert alert-danger">
					<h3 class="alert-heading">Alert</h3>
					{{ $error }}
				</div>
			@endforeach
		@endif --}}
		<br><br>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_create">Buat Baru <span class="fa fa-plus"></span></button>
		<br><br>
		<table class="table table-bordered table-striped">
			<thead>
				<th class="text-center">No</th>
				<th class="text-center">Tarif</th>
				<th class="text-center">Jenis Kendaraan</th>
				<th class="text-center">Action</th>
			</thead>
			<tbody>
				@foreach ($data as $datas)
				<tr class="text-center">
				<td>{{ $no++ }}</td>
				<td>Rp.{{ number_format($datas->tarif) }}</td>
				<td>{{ $datas->jenis_kendaraan }}</td>
				<td>
					<div class="btn-group">
					<a href="/tarif/HapusTarif/{{ $datas->id }}" class="btn btn-danger"><span class="fa fa-trash"></span></a>
					<a href="/tarif/GetTarif/{{ $datas->id }}" class="btn btn-success"><span class="fa fa-pencil"></span></a>
					</div>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<form action="/tarif/InputTarif" method="post">
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Input Tarif</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div class="row">
       		<div class="col-md-12">
       			<div class="row">
       				<div class="col-md-12">
       					<div class="form-group">
       						<label for="">Jenis Kendaraan</label>
       						<input type="text" name="jenis_kendaraan" value="{{ old('jenis_kendaraan') }}" placeholder="" class="form-control{{ $errors->has('jenis_kendaraan') ? ' is-invalid' : '' }}">
       						@if ($errors->has('jenis_kendaraan'))
       							<span class="help-block">
       								<p style="color: red">{{ $errors->first('jenis_kendaraan') }}</p>
       							</span>
       						@endif
       					</div>
       				</div>

       				<div class="col-md-12">
       					<div class="form-group">
       						<label for="">Tarif</label>
       						<input type="number" name="tarif" value="{{ old('tarif') }}" placeholder="" class="form-control{{ $errors->has('tarif') ? ' is-invalid' : '' }}">
							@if ($errors->has('tarif'))
								<span class="help-block">
									<p style="color:red">{{ $errors->first('tarif') }}</p>
								</span>
							@endif
       					</div>
       				</div>
       			</div>
       		</div>
       	</div>
      </div>
      <div class="modal-footer">
      	{{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection