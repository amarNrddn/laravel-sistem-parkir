<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Anton|Bangers|Monoton|PT+Sans|Righteous|Shadows+Into+Light|Shrikhand|Spirax" rel="stylesheet">
	<style>
		body{
		font-family: arial;
		}
		footer{
			font-family: arial;
		}
		@media print{
			footer{
				display: none;
			}
			navbar{
				display: none;
			}
			#tgl{
				display: none;
			}
		}
	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a href="" class="navbar-brand" style="font-family: 'Bangers', cursive;">Parkir.In</span>	</a>

	<div class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a href="/home" class="nav-link">Dashboard <span class="sr-only"></span></a>
			</li>
			@if (Auth::user()->level == "User")
			<li class="nav-item">
				<a href="/transaksi/kendaraan_masuk" class="nav-link" role="button">Input Parkir</a>
			</li>
			@endif
			@if (Auth::user()->level == "Admin")
			<li class="nav-item dropdown">
			<a href="#" class="nav-link dropdown-toggle" id="laporan" data-toggle="dropdown" role="button">Laporan
			</a>
			<div class="dropdown-menu">
				<a href="/laporan/LaporanParkiranKeluar" class="dropdown-item">Laporan Parkir</a>
				<a href="/laporan/LaporanParkiranTanggal" class="dropdown-item">Laporan Parkir Per-Tanggal</a>
			</div>
			
			</li>
			<li class="nav-item">
				<a href="/pegawai/DataPegawai" class="nav-link">Data Pegawai <span class="fa fa-user"></span></a>
			</li>
			<li class="nav-item">
				<a href="/tarif/TarifParkir" class="nav-link">Kelola Tarif <span class="fa fa-money"></span></a>
			</li>
			@endif
		</ul>
		<a href="" class="nav-link" style="color:white;margin-right:1%">{{ Auth::user()->nama_user }} ({{ Auth::user()->level }})</a>
		<form action="{{ route('logout') }}" method="post">
				{{ csrf_field() }}
			<button type="submit" class="btn btn-outline-danger">Logout <span class=""></span></button>
		</form>
	</div>
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			@yield('content')
		</div>
	</div>
</div>

{{-- <footer class="bg-dark" style="width:100%%;height:90px;bottom:0;color:#999;margin-top:20%">
	<div class="row">
	<div class="col-md-12">
		<p style="font-size:22px;margin-left:36%;margin-top:2.2%"><span class="fa fa-copyright"> Copyrights 2018 | Create By <a href="">Pramudya Saputra</a></span></p>				
	</div>
	</div>			
</footer> --}}


<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script src="{{  asset('js/jquery.dataTables.min.js')}}"></script>	
<script src="{{  asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
	$('#jenis_kendaraan').on('change',function(e){
		var jenis = $('#jenis_kendaraan').val();
		$.ajax({
			type : 'get',
			url : '{!! URL::to('/transaksi/find_tarif') !!}',
			data : {'jenis_kendaraan':jenis},
			dataType : 'json',
			success : function(data){
				$('#tarifs').val(data.tarif);
			},
			error:function(){

			}
		});
	});

	$('#bayar').keyup(function(){
		var bayar = $('#bayar').val();
		var total = $('#total').val()
		var kembali = bayar - total;
		$('#kembalian').val(kembali);
	});
	
    $('#example').DataTable();

	// $('#selesai').click(function(){
	// 	var bayar = $('#bayar').val();
	// 	var total = $('#total').val(); 
	// 	var id = $('#id').val();
	// 	if (bayar < total) {
	// 		alert('Uang Bayar Kurang!');document.location.href='/ParkirSelesai/'.id;
	// 	}
	// });
</script>	
</body>
</html>