<?php 
namespace App; 
use Illuminate\Database\Eloquent\Model; 
class Datapelamar extends Model 
{ 
    protected $table = 'datapelamar';
 protected $fillable = [ 
 "pi", 
 "nama", 
 "ttl", 
 "usia", 
 "jk", 
 "email",
 "hp",
 "medsos",
 "pendidikan_terakhir",
 "nama_instansi",
 "tahun_masuk",
 "tahun_lulus",
 "penghargaan",
 "nama_perusahaan",
 "posisi",
 "identitas_atasan",
 "gaji_terakhir",
 "jenis_pekerjaan",
 "keahlian_utama",
 "fc_kk",
 "fc_ktp",
 "fc_ijazah",
 "transkrip_nilai",
 "foto",
 "skck",
 "surat_keterangan_sehat",
 "sertifikat",
 "surat_keterangan_pengalaman_kerja",
 "id_user"
 ]; 
} 
?>