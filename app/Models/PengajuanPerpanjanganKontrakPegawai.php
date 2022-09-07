<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPerpanjanganKontrakPegawai extends Model
{
    protected $table = 'tbl_perpanjangan_kontrak_pegawai';
    protected $fillable = [ 
        "id_kontrak_pegawai",
        "analisis_sdm",
        "keputusan_pimpinan",
        "status"
    ]; 
}
