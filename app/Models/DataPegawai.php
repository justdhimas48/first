<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Model; 
class Datapegawai extends Model 
{ 
    protected $table = 'tbl_datapegawai';
   protected $fillable = [ 
      'nip',
      'nama',
      'alamat', 
      'tempat_lahir',
      'tanggal_lahir',
      'no_ktp',
      'jenis_kelamin',
      'status',
      'jabatan',
      'agama',
      'no_hp',
      'email',
      'foto_diri',
      'tanggal_sk',
      'pendidikan',
      'program_studi',
      'tahun_kelulusan',
      'id_user',
      'id_pelamar',
      'id_kategori_unit_kerja',
      'sk_pegawai_tetap'
   ]; 

   public static function generateNip(){
      $last = Datapegawai::orderBy('id', 'desc')->first();
      $number = empty($last) ? "1" : $last->id + 1 . "";
      while (strlen($number) < 3) {
         $number = "0" . $number;
      }
      $year = substr(date('Y'), -2);
      $day = date('d');
      $month = date('m');

      $formattedNumber = $year . $day . $month . $number;
      return $formattedNumber;
   }
} 
?>