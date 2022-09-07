<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenugasanPegawai extends Model
{
    protected $table = 'tbl_penugasan_pegawai';
    protected $fillable = [ 
        "id_pegawai",
        "jenis_penugasan",
        "deskripsi_penugasan",
        "jadwal_mulai_penugasan",
        "jadwal_akhir_penugasan",
        "surat_keterangan_penugasan",
        "status"
    ]; 
}
