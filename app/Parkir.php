<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
	protected $table = 'parkir_masuk';
   	protected $fillable = ['code','plat_nomor','jenis_kendaraan','jam_masuk','tgl_masuk'];
   	public $timestamps = false;
}
