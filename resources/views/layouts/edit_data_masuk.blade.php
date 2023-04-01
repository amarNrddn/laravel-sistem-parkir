@extends('master_layout.master')

@section('title','Edit Data Parkiran Masuk')

@section('content')
<form action="/transaksi/UpdateDataParkiranMasuk/{{ $data->id }}" method="post">
	{{ method_field('patch') }}
<div class="row">
	<div class="col-md-5 offset-md-4" style="margin-top:8%">
		<div class="card card-default">
			<div class="card-header">
				<h3>Edit Data Parkiran</h3>
			</div>
			<div class="card-body">
					<div class="col-md-12">
						<div class="form-group">
							<label for="">Plat Nomor/No Polisi</label>
							<input type="text" name="plat_nomor" value="{{ $data->plat_nomor }}" placeholder="" class="form-control" required="" autocomplete="off">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="">Jenis Kendaraan</label>
							<select name="jenis_kendaraan" id="" class="form-control">
								<option value="">Pilih Kendaraan</option>
								@if ($data->jenis_kendaraan == "Mobil")
									<option value="Mobil" selected="">Mobil</option>
									<option value="Motor">Motor</option>
								@else
									<option value="Motor" selected="">Motor</option>
									<option value="Mobil">Mobil</option>
								@endif
							</select>
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