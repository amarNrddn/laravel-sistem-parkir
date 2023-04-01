<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkirKeluar extends Model
{
   	protected $table = 'parkir_keluar';
   	protected $fillable = ['id','code','plat_nomor','jenis_kendaraan','jam_keluar','tgl_keluar','total','bayar','kembalian'];
   	public $timestamps = false;
}
