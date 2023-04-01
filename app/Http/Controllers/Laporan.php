<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parkir;
use App\Tarif;
use App\ParkirKeluar;
use Illuminate\Support\Facades\DB;

class Laporan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$date = date('d-m-Y');
    	$data = DB::table('laporan_parkiran')->paginate(10);
    	$biaya = DB::table('laporan_parkiran')->sum('total');
    	$mobil = DB::table('laporan_parkiran')->where('jenis_kendaraan','=','Mobil')->count();
    	$motor = DB::table('laporan_parkiran')->where('jenis_kendaraan','=','Motor')->count();
    	$no = 1;
    	return view('layouts.laporan_parkir_keluar',['data'=>$data,'no'=>$no,'date'=>$date,'total'=>$biaya,'mobil'=>$mobil,'motor'=>$motor]);
    }
    public function show(){
    	$date = date('d-m-Y');
    	$data = DB::table('laporan_parkiran')->paginate(10);
    	$biaya = DB::table('laporan_parkiran')->sum('total');
    	$mobil = DB::table('laporan_parkiran')->where('jenis_kendaraan','=','Mobil')->count();
    	$motor = DB::table('laporan_parkiran')->where('jenis_kendaraan','=','Motor')->count();
    	$no = 1;

    	return view('layouts.laporan_parkir_perTanggal',['data'=>$data,'no'=>$no,'date'=>$date,'total'=>$biaya,'mobil'=>$mobil,'motor'=>$motor]);
    }
    public function process(Request $request){
    	$start = $request->start;
    	$end = $request->end;
        $data = DB::table('laporan_parkiran')->whereBetween('tgl_masuk',[$start,$end])->get();
        $biaya = DB::table('laporan_parkiran')->whereBetween('tgl_masuk',[$start,$end])->sum('total');
        $mobil = DB::table('laporan_parkiran')->whereBetween('tgl_masuk',[$start,$end])->where('jenis_kendaraan','=','Mobil')->count();
        $motor = DB::table('laporan_parkiran')->whereBetween('tgl_masuk',[$start,$end])->where('jenis_kendaraan','=','Motor')->count();
        $no = 1;

        $tahun = substr($start,0,4);
        $bulan = substr($start,4,4);
        $hari = substr($start,8,8);

        $tahun2 = substr($end,0,4);
        $bulan2 = substr($end,4,4);
        $hari2 = substr($end,8,8);

        $d_start = $hari.$bulan.$tahun;
        $d_end = $hari2.$bulan2.$tahun2;

        return view('layouts.result_tanggal',['data'=>$data,'no'=>$no,'total'=>$biaya,'mobil'=>$mobil,'motor'=>$motor,'tgl_masuk'=>$start,'tgl_out'=>$end,'start'=>$d_start,'end'=>$d_end]);
    }
}
