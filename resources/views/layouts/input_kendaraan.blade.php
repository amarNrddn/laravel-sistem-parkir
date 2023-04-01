@extends('master_layout.master')

@section('title','Input Kendaraan Masuk')


@section('content')
<div class="row">
	<!-- Masuk Parkir -->
		<div class="col-md-7" style="margin-top: 10px;">
			<div class="col-md-10 panel">
			{{-- <div class="col-md-12 panel-heading bg-teal">
				<h4 style="color: white;font-size: 20pt;">Masuk Parkir <span class="right" style="color : #f6c700; font-weight: bold; text-align: right; padding-right: 10px;">Empty : 0</span></h4>
			</div> --}}
			<div class="card card-default">
				<div class="card-header bg-primary">
					<h3 class="text-center" style="color:white">PARKIR IN</h3>
				</div>
			<div class="col-md-12 panel-body" style="padding-bottom:25px;">
				<div class="col-md-12">
				<form class="cmxform" action="/transaksi/StoreInput" method="post">
					<div class="row">
					<div class="col-md-6">
						<div class="form-group form-animate-text" style="margin-top:15px !important;">
							<input type="text" name="code" value="{{ $code }}" placeholder="" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" autocomplete="off" readonly="">
							@if ($errors->has('code'))
								<span class="help-block">
									<p style="color:red">Alert  {{ $errors->first('code') }}</p>
								</span>
							@endif
						<label>Code</label>
						</div>

						<div class="form-group form-animate-text" style="margin-top:15px !important;">
							<input type="text" name="no_polisi" value="" placeholder="" class="form-control{{ $errors->has('no_polisi') ? ' is-invalid' : '' }}" autocomplete="off" maxlength="7">
							@if ($errors->has('no_polisi'))
								<span class="help-block">
									<p style="color:red">Alert  {{ $errors->first('no_polisi') }}</p>
								</span>
							@endif
						<label>Plat Nomor</label>
						</div>

						<div class="form-group form-animate-text" style="margin-top:10px !important;">
							<select name="jenis_kendaraan" id="jenis_kendaraan" class="form-control{{ $errors->has('jenis_kendaraan') ? ' is-invalid' : '' }}">
								<option value="">Pilih Kendaraan</option>
								@foreach ($jenis_kendaraan as $datas)
									<option value="{{ $datas->jenis_kendaraan }}">{{ $datas->jenis_kendaraan }}</option>
								@endforeach
							</select>
							@if ($errors->has('jenis_kendaraan'))
								<span class="help-block">
									<p style="color:red">Alert {{ $errors->first('jenis_kendaraan') }}</p>
								</span>
							@endif
						<label>Jenis Kendaraan</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group form-animate-text" style="margin-top:15px !important;">
							<input type="number" name="tarif" id="tarifs" value="" placeholder="" class="form-control{{ $errors->has('tarif') ? ' is-invalid' : ''  }} text-center" readonly="">
							@if ($errors->has('tarif'))
								<span class="help-block">
									<p style="color:red">Alert {{ $errors->first('tarif') }}</p>
								</span>
							@endif
						<label>Tarif</label>
						</div>

						<div class="form-group form-animate-text" style="margin-top:10px !important;">
							<input type="text" name="tgl_masuk" value="{{ $automatic_date }}" placeholder="" class="form-control{{ $errors->has('tgl_masuk') ? ' is-invalid' : '' }} text-center" readonly="">
							@if ($errors->has('tgl_masuk'))
								<span class="help-block">
									<p style="color:red">Alert {{ $errors->first('tgl_masuk') }}</p>
								</span>
							@endif
						<label>Jam Masuk</label>
						</div>
					</div>
					</div>
					<br>
			{{ csrf_field() }}
			<div class="col-md-12">
				<button type="submit" class="btn btn-outline-primary btn-block" name="simpan">Simpan</button>
			</div>
				</form>
			</div>
			</div>
		</div>
		</div>
	  </div>
	  <!-- end:Masuk Parkir -->

	  <div class="col-md-5" style="margin-top: 5%">
		<div class="col-md-10 panel">
		  <div class="card card-default">
			  <div class="card-header bg-primary">
				  <h3 class="text-center" style="color:white">PARKIR OUT</h3>
			  </div>
		  <div class="col-md-12 panel-body" style="padding-bottom:25px;">
			<div class="col-md-12">
			  <form class="cmxform" action="/transaksi/Show/" method="GET">
				  <div class="col-md-12">
					  <div class="form-group form-animate-text" style="margin-top:15px !important;">
						  <input type="text" id="code" name="code" value="" placeholder="Masukan Kode" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}">
					  </div>
				  </div>
				<br>
		  {{ csrf_field() }}
		  <div class="col-md-12">
			<button type="submit" class="btn btn-outline-primary btn-block" name="go">Go</button>
		  </div>
			</form>
		  </div>
		</div>
	  </div>
	  </div>
	  </div>
	  <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 0px;">
		{{-- <div class="col-md-12"> --}}
			@if (session('message'))
				<div class="alert alert-success alert-dismissible" style="margin-top: 4%;margin-right: 10px; position:fixed; top:0; right:0; width:250px;>
					<h3>Success <span class="fa fa-check"></span></h3>
					<hr style="margin-top:-0.6%">
					{{ session('message') }}
					<button type="button" class="close" data-dismiss="alert">
						<span>&times;</span>
					</button>
				</div>
			@endif
			<br><br>
			<div class="panel-body">
			<div class="table-responsive col-md-12 col-sm-12 col-xs-12">
			<table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0">
				<thead>
					<th class="text-center">No</th>
					<th class="text-center">Code</th>
					<th class="text-center">No Polisi</th>
					<th class="text-center">Jenis Kendaraan</th>
					<th class="text-center">Jam masuk</th>
					<th class="text-center">Tanggal Masuk</th>
					<th class="text-center">Action</th>
				</thead>
				<tbody>
					@if (count($data) <= 0)
						<tr>
							<td colspan="6" class="text-center">Data Empty</td>
						</tr>
					@else
					@foreach ($data as $datas)
					<tr>
					<td class="text-center">{{ $no++ }}</td>
					<td class="text-center">{{ $datas->code }}</td>
					<td class="text-center">{{ $datas->plat_nomor }}</td>
					<td class="text-center">{{ $datas->jenis_kendaraan }}</td>
					<td class="text-center">{{ $datas->jam_masuk }}</td>
					<td class="text-center">{{ $datas->tgl_masuk }}</td>
					<td>
						<div class="btn-group" style="margin-left:17%">
						<a href="/transaksi/editDataParkiranMasuk/{{ $datas->id }}" class="btn btn-success"><span class="fa fa-pencil"></span></a>
						{{-- <a href="/transaksi/ParkirSelesai/{{ $datas->id }}" class="btn btn-primary">Selesai</a> --}}
						<a href="/transaksi/struk/{{ $datas->id }}" class="btn btn-dark">Struk</a>
						</div>
					</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
			</div>
			</div>
		{{-- </div> --}}
	</div>
</div>

@endsection