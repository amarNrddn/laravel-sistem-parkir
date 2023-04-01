@extends('master_layout.master')


@section('title','Data Parkiran Keluar')


@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">
		<br><br><br><br>
		<div class="row" style="margin-bottom:0.3%">
		<div class="col-md-12">
		<div class="form-inline">
			<form action="{{ url('/transaksi/searchKeluar') }}" method="GET">
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
				<th class="text-center">Jam Keluar</th>
				<th class="text-center">Tanggal Keluar</th>
				<th class="text-center">Total Harga</th>
				<th class="text-center">Bayar</th>
				<th class="text-center">Kembalian</th>
			</thead>
			<tbody>
				@if (count($data) <= 0)
					<tr>
						<td colspan="8" class="text-center">Data Empty</td>
					</tr>
				@else
				@foreach ($data as $datas)
				<tr>
				<td class="text-center">{{ $datas->id }}</td>
				<td class="text-center">{{ $datas->plat_nomor }}</td>
				<td class="text-center">{{ $datas->jenis_kendaraan }}</td>
				<td class="text-center">{{ $datas->jam_keluar }}</td>
				<td class="text-center">{{ $datas->tgl_keluar }}</td>
				<td class="text-center">Rp.{{ number_format($datas->total) }}</td>
				<td class="text-center">Rp.{{ number_format($datas->bayar) }}</td>
				<td class="text-center">Rp.{{ number_format($datas->kembalian) }}</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
		{{ $data->render() }}
	</div>
</div>

@endsection