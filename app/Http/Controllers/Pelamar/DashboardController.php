<?php

namespace App\Http\Controllers\Pelamar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Datapelamar; 
use App\Models\JadwalTes; 
use App\Models\User; 
use App\Models\HasilInterview; 
use Auth;

class DashboardController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }
    public function index() {
      $datapelamar = Datapelamar::where('id_user', Auth::id())->first();
      return view('pelamar.informasi-diri', compact('datapelamar'));
    }

    public function store(Request $request)
   {
      $pelamar = Datapelamar::where('id', '=', $request->id)->first();
      //validasi inputan 
      $this->validate($request, [
         'nama' => 'required',
         // 'tempat_lahir' => 'required',
         // 'tanggal_lahir' => 'required',
         // 'jenis_kelamin' => 'required',
         // 'no_hp' => 'required',
         // 'foto_kk' => 'required',
         // 'foto_ktp' => 'required',
         // 'foto_ijazah' => 'required',
         // 'foto_diri' => 'required',
         // 'foto_skck' => 'required',
         // 'surat_keterangan_sehat' => 'required',
         // 'kompetensi_khusus' => 'required_if:pekerjaan_tujuan,=,dosen',
      ]);

      if($request->pekerjaan_tujuan == 'dosen' && $pelamar->kompetensi_khusus == null){
         $this->validate($request, [
            'kompetensi_khusus' => 'required',
         ]);
      }

      $pelamar->nama = $request->nama;
      $pelamar->tanggal_lahir = $request->tanggal_lahir;
      $pelamar->tempat_lahir = $request->tempat_lahir;
      $pelamar->jenis_kelamin = ($request->jenis_kelamin == "Laki-Laki") ? 0 : 1;
      $pelamar->no_hp = $request->no_hp;
      $pelamar->nidn = $request->nidn;
      $pelamar->pendidikan_s1 = $request->pendidikan_s1;
      $pelamar->pendidikan_s2 = $request->pendidikan_s2;
      $pelamar->pendidikan_s3 = $request->pendidikan_s3;
      $pelamar->pekerjaan_tujuan = $request->pekerjaan_tujuan;
      $pelamar->jurusan_bidang = $request->jurusan_bidang;
      $pelamar->deskripsi_kompetensi_khusus = $request->keterangan_kompetensi_khusus;

      $user = User::where('id', '=', $pelamar->id_user)->first();
      
      if ($request->kompetensi_khusus) {
         $namefile = 'kompetensi_khusus_' . date("Y_m_d_H_i_s") . '.' . $request->kompetensi_khusus->extension();
         $inputs['kompetensi_khusus'] = 'storage/pelamar/' . $user->id . '/' . $namefile;
         request('kompetensi_khusus')->storeAs('pelamar/' . $user->id, $namefile, 'public');
         $pelamar->kompetensi_khusus = $inputs['kompetensi_khusus'];
      }

      if ($request->foto_kk) {
         $namefile = 'kk_' . date("Y_m_d_H_i_s") . '.' . $request->foto_kk->extension();
         $inputs['foto_kk'] = 'storage/pelamar/' . $user->id . '/' . $namefile;
         request('foto_kk')->storeAs('pelamar/' . $user->id, $namefile, 'public');
         $pelamar->foto_kk = $inputs['foto_kk'];
      }

      if ($request->foto_ktp) {
         $namefile = 'ktp_' . date("Y_m_d_H_i_s") . '.' . $request->foto_ktp->extension();
         $inputs['foto_ktp'] = 'storage/pelamar/' . $user->id . '/' . $namefile;
         request('foto_ktp')->storeAs('pelamar/' . $user->id, $namefile, 'public');
         $pelamar->foto_ktp = $inputs['foto_ktp'];
      }

      if ($request->foto_ijazah) {
         $namefile = 'ijazah_' . date("Y_m_d_H_i_s") . '.' . $request->foto_ijazah->extension();
         $inputs['foto_ijazah'] = 'storage/pelamar/' . $user->id . '/' . $namefile;
         request('foto_ijazah')->storeAs('pelamar/' . $user->id, $namefile, 'public');
         $pelamar->foto_ijazah = $inputs['foto_ijazah'];
      }

      if ($request->foto_diri) {
         $namefile = 'diri_' . date("Y_m_d_H_i_s") . '.' . $request->foto_diri->extension();
         $inputs['foto_diri'] = 'storage/pelamar/' . $user->id . '/' . $namefile;
         request('foto_diri')->storeAs('pelamar/' . $user->id, $namefile, 'public');
         $pelamar->foto_diri = $inputs['foto_diri'];
      }

      if ($request->foto_skck) {
         $namefile = 'skck_' . date("Y_m_d_H_i_s") . '.' . $request->foto_skck->extension();
         $inputs['foto_skck'] = 'storage/pelamar/' . $user->id . '/' . $namefile;
         request('foto_skck')->storeAs('pelamar/' . $user->id, $namefile, 'public');
         $pelamar->foto_skck = $inputs['foto_skck'];
      }

      if ($request->surat_keterangan_sehat) {
         $namefile = 'surat_keterangan_sehat_' . date("Y_m_d_H_i_s") . '.' . $request->surat_keterangan_sehat->extension();
         $inputs['surat_keterangan_sehat'] = 'storage/pelamar/' . $user->id . '/' . $namefile;
         request('surat_keterangan_sehat')->storeAs('pelamar/' . $user->id, $namefile, 'public');
         $pelamar->surat_keterangan_sehat = $inputs['surat_keterangan_sehat'];
      }

      if ($request->surat_pengalaman_kerja) {
         $namefile = 'surat_pengalaman_kerja_' . date("Y_m_d_H_i_s") . '.' . $request->surat_pengalaman_kerja->extension();
         $inputs['surat_pengalaman_kerja'] = 'storage/pelamar/' . $user->id . '/' . $namefile;
         request('surat_pengalaman_kerja')->storeAs('pelamar/' . $user->id, $namefile, 'public');
         $pelamar->surat_pengalaman_kerja = $inputs['surat_pengalaman_kerja'];
      }

      $pelamar->save();

      return redirect()->route("pelamar.informasi-diri")->with(
         "success",
         "Data berhasil disimpan."
      );
   }

    public function jadwalTes() {
      $datapelamar = Datapelamar::where('id_user', Auth::id())->first();
      $jadwalTesInterview = JadwalTes::where('id_pelamar', $datapelamar->id)->where('id_jenis_interview', 1)->first();
      $jadwalTesKontrakPegawai = JadwalTes::where('id_pelamar', $datapelamar->id)->where('id_jenis_interview', 2)->first();

      $hasilInterview = HasilInterview::where('id_pelamar', $datapelamar->id)->where('id_jenis_interview', 1)->first();
      $hasilKontrakPegawai = HasilInterview::where('id_pelamar', $datapelamar->id)->where('id_jenis_interview', 2)->first();
      return view('pelamar.jadwal-tes', compact('jadwalTesInterview', 'jadwalTesKontrakPegawai', 'hasilInterview', 'hasilKontrakPegawai', 'datapelamar'));
    }
}
