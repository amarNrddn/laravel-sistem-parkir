@extends('master_layout.master')

@section('title','Data Parkiran Masuk')


@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">
		<br><br>
		@if (session('message'))
			<div class="alert alert-success">
				<h3>Success <span class="fa fa-check"></span></h3>
				<hr style="margin-top:-0.6%">
				{{ session('message') }}
			</div>
		@endif
		<br><br>
		<div class="row" style="margin-bottom:0.3%">
		<div class="col-md-12">
		<div class="form-inline">
			<form action="{{ url('search') }}" method="GET">
			<input type="text" name="cari" value="" placeholder="Search Here...." class="form-control" autocomplete="off">
			<button type="submit" class="btn btn-success">Cari <span class="fa fa-search"></span></button>
			</form>
		</div>
		</div>
		</div>

		<table class="table table-bordered table-striped">
			<thead>
				<th class="text-center">Id Parkir</th>
				<th class="text-center">No Polisi</th>
				<th class="text-center">Jenis Kendaraan</th>
				<th class="text-center">Jam masuk</th>
				<th class="text-center">Tanggal Masuk</th>
				<th class="text-center">Action</th>
			</thead>
			<tbody>
				@if (count($data) <= 0)
					<tr>
						<td colspan="6" class="text-center">Data Not Found</td>
					</tr>
				@else
				@foreach ($data as $datas)
				<tr>
				<td class="text-center">{{ $datas->id }}</td>
				<td class="text-center">{{ $datas->plat_nomor }}</td>
				<td class="text-center">{{ $datas->jenis_kendaraan }}</td>
				<td class="text-center">{{ $datas->jam_masuk }}</td>
				<td class="text-center">{{ $datas->tgl_masuk }}</td>
				<td>
					<div class="btn-group" style="margin-left:17%">
					<a href="/HapusDataParkiranMasuk/{{ $datas->id }}" class="btn btn-danger" onclick="return confirm('Apa Anda Yakin Menghapus Data Ini ?')"><span class="fa fa-trash"></span></a>
					<a href="/" class="btn btn-success"><span class="fa fa-pencil"></span></a>
					<a href="/" class="btn btn-primary">Selesai</a>
					</div>
				</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
		{{ $data->render() }}
	</div>
</div>


@endsection