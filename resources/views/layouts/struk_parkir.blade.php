@extends('master_layout.master')

@section('content')
<style type="text/css">
	@media print{
		#User{
		margin-left:55% !important;
		margin-top:-11% !important;
		}

		#print{
			display: none;
		}
	}
</style>
<div class="row">
	<div class="col-md-5 offset-md-4">
		<br><br>
		<a class="btn btn-primary" href="/transaksi/kendaraan_masuk" role="button" style="margin-top:3%">Back</a>
		<a href="" class="btn btn-success" onclick="window.print()" id="print" style="margin-top:3%">Print <span class="fa fa-print"></span></a>
		<div class="card card-default" style="margin-top:3%;height:355px">
			<div class="card-header">
				<h3 class="text-center">Struk Parkir.In</h3>
				<hr>
				<p>Parkir.In</p>
				<p style="margin-left:60%;margin-top:-8%" id="User">User : {{ Auth::user()->nama_user }}</p>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<label for="">Code :</label>
						<label for="">{{ $data->code }}</label>
					</div>
					<div class="col-md-6">
						<label for="">No Polisi :</label>
						<label for="">{{ $data->plat_nomor }}</label>
					</div>
					<div class="col-md-6">
						<label for="">Jam Masuk :</label>
						<label for="">{{ $data->jam_masuk  }}</label>
					</div>	
					<div class="col-md-6">
						<label for="">Tarif :</label>
						<label for="">Rp.{{ $tarif->tarif }}/jam</label>
					</div>
					<div class="col-md-6">
						<label for="">Jenis Kendaraan :</label>
						<label for="">{{ $data->jenis_kendaraan }}</label>
					</div>
					<div class="col-md-12">
						<label for="">Tgl parkir:</label>
						<label for="">{{ $tgl }}</label>
					</div>
					<br>
					<div class="col-md-12" class="text-center" style="margin-top:5%;">
						<p class="text-center" style="font-size:12px">=============== Jangan Sampai Hilang ================</p>
						<br>
					</div>
					<div class="row">
					<div class="col-md-12">
						<p style="font-size:12px;">*)Struk ini sebagai bukti pembayaran</p>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection