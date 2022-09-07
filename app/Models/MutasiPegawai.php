<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiPegawai extends Model
{
    protected $table = 'tbl_mutasi_pegawai';
    protected $fillable = [ 
        "id_pegawai",
        "pekerjaan_awal",
        "jabatan_awal",
        "pekerjaan_tujuan",
        "jabatan_tujuan",
        "deskripsi",
        "dimutasi_oleh",
        "id_kategori_unit_kerja_sebelum",
        "id_kategori_unit_kerja_sesudah",
        "surat_keterangan_pindah_unit"
    ]; 
}
