@extends('master_layout.master')


@section('title','Selesai Parkir')


@section('content')
<form action="/transaksi/StoreSelesai"  method="post">
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
	<div class="col-md-8 offset-md-2">
		<br><br><br><br>
		@if (session('message'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
 			<h3><b>Alert</b></h3>
 			<hr>
 			<p>{{ session('message') }}</p>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			 <span aria-hidden="true">&times;</span>
 			 </button>
			</div>			
		@endif
		<div class="card card-default">
			<div class="card-header">
				<h3>Kendaraan Keluar</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4" hidden="">
						<div class="form-group">
							<label for="">Id Parkir</label>
							<input type="text" id="id" name="id_parkir" value="{{ $data->id }}" placeholder="" class="form-control{{ $errors->has('id_parkir') ? ' is-invalid' : '' }}" readonly="">
							@if ($errors->has('id_parkir'))
								<span class="help-block">
									<p style="color:red;">Alert {{ $errors->first('id_parkir') }}</p>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Code</label>
							<input type="text" name="code" value="{{ $data->code }}" placeholder="" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" readonly="">
							@if ($errors->has('code'))
								<span class="help-block">
									<p style="color:red">Alert {{ $errors->first('code') }}</p>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">No Polisi</label>
							<input type="text" name="no_polisi" value="{{ $data->plat_nomor }}" placeholder="" class="form-control{{ $errors->has('no_polisi') ? ' is-invalid' : '' }}" readonly="">
							@if ($errors->has('no_polisi'))
								<span class="help-block">
									<p style="color:red">Alert {{ $errors->first('no_polisi') }}</p>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Jenis Kendaraan</label>
							<input type="text" name="jenis_kendaraan" value="{{ $data->jenis_kendaraan }}" placeholder="" class="form-control{{ $errors->has('jenis_kendaraan') ? ' is-invalid' : '' }}" readonly="">
							@if ($errors->has('jenis_kendaraan'))
								<span class="help-block">
									<p style="color:red">Alert {{ $errors->first('jenis_kendaraan') }}</p>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Bayar</label>
							<input type="number" name="bayar" value="" placeholder="" class="form-control{{ $errors->has('bayar') ? ' is-invalid' : '' }}" id="bayar" autocomplete="off">
							@if ($errors->has('bayar'))
								<span class="help-block">
									<p style="color:red">Alert {{ $errors->first('bayar') }}</p>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<label for="">Kembalian</label>
						<input type="number" name="kembalian" value="" placeholder="" class="form-control{{ $errors->has('kembalian') ? ' is-invalid' : '' }}" id="kembalian" readonly="">
						@if ($errors->has('kembalian'))
							<span class="help-block">
								<p style="color:red">Alert {{ $errors->first('kembalian') }}</p>
							</span>
						@endif
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Total Harga</label>
							<input type="text" name="total_harga" value="{{ $tt }}" placeholder="" class="form-control{{ $errors->has('total_harga') ? ' is-invalid' : '' }}" readonly="" id="total">
							@if ($errors->has('total_harga'))
								<span class="span-block">
									<p style="color:red">Alert {{ $errors->first('total_harga') }}</p>
								</span>
							@endif
						</div>
					</div>
				</div>
				{{ csrf_field() }}
				<a class="btn btn-primary" href="/transaksi/kendaraan_masuk" role="button">Back</a>
				<button type="submit" class="btn btn-success" id="selesai">Selesai</button>
			</div>
		</div>
	</div>
</div>
</form>

@endsection