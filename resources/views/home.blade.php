@extends('master_layout.master')

@section('title','HomePage')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4" style="margin-top:1%">
                <div class="card card-default">
                    <div class="card-header bg-primary">
                        <h3 class="text-center" style="color:white">Ruang Parkir</h3>
                    </div>
                    <div class="card-body">
                       <div class="card-title">
                           <h3 class="text-center">Mobil : {{ $r_mobil->stok }}</h3>
                       </div>
                       <div class="card-title">
                           <h3 class="text-center">Motor : {{ $r_motor->stok }}</h3>
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-top:1%">
                <div class="card card-default">
                    <div class="card-header bg-success">
                        <h3 class="text-center" style="color:white">Kendaraan Parkir Hari Ini</h3>
                    </div>
                    <div class="card-body">
                       <div class="card-title">
                           <h3 class="text-center">Mobil : {{ $mobil }}</h3>
                       </div>
                       <div class="card-title">
                           <h3 class="text-center">Motor : {{ $motor }}</h3>
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-top:1%">
                <div class="card card-default" style="height:190px">
                    <div class="card-header bg-warning">
                        <h3 class="text-center" style="color:white">Pendapatan Hari Ini</h3>
                    </div>
                    <div class="card-body">
                       <h1 class="text-center" style="margin-top:5%">Rp.{{ number_format($pendapatan) }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
		<br>
		<table class="table table-bordered table-striped">
			<thead>
				<th class="text-center">No</th>
                <th class="text-center">Code</th>
				<th class="text-center">No Polisi</th>
				<th class="text-center">Jenis Kendaraan</th>
				<th class="text-center">Jam Keluar</th>
				<th class="text-center">Tanggal Keluar</th>
				<th class="text-center">Total Harga</th>
				<th class="text-center">Bayar</th>
				<th class="text-center">Kembalian</th>
			</thead>
			<tbody>
				@foreach ($data as $datas)
				<tr>
                <td class="text-center">{{ $no++ }}</td>
                <td class="text-center">{{ $datas->code }}</td>
				<td class="text-center">{{ $datas->plat_nomor }}</td>
				<td class="text-center">{{ $datas->jenis_kendaraan }}</td>
				<td class="text-center">{{ $datas->jam_keluar }}</td>
				<td class="text-center">{{ $datas->tgl_keluar }}</td>
				<td class="text-center">Rp.{{ number_format($datas->total) }}</td>
				<td class="text-center">Rp.{{ number_format($datas->bayar) }}</td>
				<td class="text-center">Rp.{{ number_format($datas->kembalian) }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $data->render() }}
	</div>
</div>
@endsection
