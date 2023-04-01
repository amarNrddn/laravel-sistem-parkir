@extends('master_layout.master')

@section('title','Laporan Kendaraan Parkir')

@section('content')
<style>
	@media print{
		#btn{
			display: none;
		}
	}
</style>
<div class="row">
	<div class="col-md-10 offset-md-1">
		<br><br>
		<a href="" class="btn btn-success" onclick="window.print()" id="btn" style="margin-bottom:2%">Print <span class="fa fa-print"></span></a>
		<form action="/laporan/result_tanggal" method="post" id="tgl">
			{{ method_field('patch') }}
		<div class="form-inline">
			<input type="date" name="start" value="" placeholder="" class="form-control">
			<b style="margin-left:1%">Sampai</b>
			<input type="date" name="end" value="" placeholder="" class="form-control" style="margin-left:1%">
			{{ csrf_field() }}
			<button type="submit" class="btn btn-primary" style="margin-left:1%"><span class="fa fa-search"></span></button>
		</div>
		</form>
		<br>
		<h1 class="text-center">Laporan Data <b>Parkir.In</b></h1>
		<hr>
		<br>
		<table class="table table-bordered table-striped">
			<thead>
				<th class="text-center">No</th>
				<th class="text-center">Code</th>
				<th class="text-center">No Polisi</th>
				<th class="text-center">Jenis Kendaraan</th>
				<th class="text-center">Jam Masuk</th>
				<th class="text-center">Jam Keluar</th>
				<th class="text-center">Tanggal Masuk</th>
				<th class="text-center">Tanggal Keluar</th>
				<th class="text-center">Total Biaya</th>
			</thead>
			<tbody>
				@foreach ($data as $datas)
				<tr>
				<td class="text-center">{{ $no++ }}</td>
				<td class="text-center">{{ $datas->code }}</td>
				<td class="text-center">{{ $datas->plat_nomor }}</td>
				<td class="text-center">{{ $datas->jenis_kendaraan }}</td>
				<td class="text-center">{{ $datas->jam_masuk }}</td>
				<td class="text-center">{{ $datas->jam_keluar }}</td>
				<td class="text-center">{{ $datas->tgl_masuk  }}</td>
				<td class="text-center">{{ $datas->tgl_keluar }}</td>
				<td class="text-center">Rp.{{ $datas->total }}</td>
				</tr>
				@endforeach
				<tr>
					<td colspan="8">Jumlah Biaya</td>
					<td class="text-center"><b>Rp.{{ number_format($total) }},00-</b></td>
				</tr>
				<tr>
					<td rowspan="3" colspan="2" class="text-center"><p style="margin-top:18%">Total Kendaraan</p></td>
				</tr>
				<tr>
					<td colspan="7">Mobil : {{ $mobil }}</td>
				</tr>
				<tr>
					<td colspan="7">Motor : {{ $motor }}</td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>


@endsection


