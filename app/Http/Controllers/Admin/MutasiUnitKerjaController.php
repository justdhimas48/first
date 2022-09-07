<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPegawai; 
use App\Models\DataUnitKerja; 
use App\Models\MutasiUnitKerja; 
use App\Models\User; 
use App\Models\KategoriUnitKerja; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class MutasiUnitKerjaController extends Controller
{
    public function index() {
        $mutasiUnitKerja = DB::table('tbl_mutasi_unitkerja')
                    ->join('tbl_dataunitkerja', 'tbl_mutasi_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->join('tbl_kategori_unit_kerja as a', 'tbl_mutasi_unitkerja.id_kategori_unit_kerja_sebelum', '=', 'a.id')
                    ->join('tbl_kategori_unit_kerja as b', 'tbl_mutasi_unitkerja.id_kategori_unit_kerja_sesudah', '=', 'b.id')
                    ->select(DB::raw('tbl_mutasi_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, a.nama as kategori_unit_kerja_sebelum, b.nama as kategori_unit_kerja_sesudah'))
                    ->paginate(10);
        return view('admin.mutasi-unitkerja.index', compact('mutasiUnitKerja'));
    }

    public function detail($id){
        $mutasiUnitKerja = DB::table('tbl_mutasi_unitkerja')
                    ->join('tbl_dataunitkerja', 'tbl_mutasi_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->join('users', 'tbl_mutasi_unitkerja.dimutasi_oleh', '=', 'users.id')
                    ->join('tbl_kategori_unit_kerja as a', 'tbl_mutasi_unitkerja.id_kategori_unit_kerja_sebelum', '=', 'a.id')
                    ->join('tbl_kategori_unit_kerja as b', 'tbl_mutasi_unitkerja.id_kategori_unit_kerja_sesudah', '=', 'b.id')
                    ->select(DB::raw('tbl_mutasi_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, users.name as nama_dimutasi_oleh, a.nama as kategori_unit_kerja_sebelum, b.nama as kategori_unit_kerja_sesudah'))
                    ->where('tbl_mutasi_unitkerja.id', $id)
                    ->first();
        return view('admin.mutasi-unitkerja.detail', compact('mutasiUnitKerja'));
    }

    public function create(){
        $unitkerja = DataUnitKerja::join('tbl_kategori_unit_kerja', 'tbl_kategori_unit_kerja.id', '=', 'tbl_dataunitkerja.id_kategori_unit_kerja')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_kategori_unit_kerja.nama as nama_kategori_unit_kerja'))
                    ->where('status', 1)
                    ->get();
        $kategoriUnitKerja = KategoriUnitKerja::where('is_actived', 1)->get();
        return view('admin.mutasi-unitkerja.create', compact('unitkerja', 'kategoriUnitKerja'));
    }

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'unitkerja' => 'required', 
            'editor' => 'required',
            'kategori_unit_kerja' => 'required', 
        ]);

        $unitkerja = DataUnitKerja::where('id', $request->unitkerja)->first();

        //Jika tidak memilih jenis mutasi
        // if($request->cb_pekerjaan == null && $request->cb_jabatan == null){
        //     return redirect()->route("admin.mutasi-unitkerja.create")->with( 
        //     "failed", 
        //     "Data gagal disimpan." 
        //     ); 
        // }
        // else if($request->cb_pekerjaan == null && $request->cb_jabatan == "on"){
        //     $this->validate($request, [ 
        //         'jabatan_tujuan' => 'required', 
        //     ]);

        //     $mutasiUnitKerja = new MutasiUnitKerja();
        //     $mutasiUnitKerja->id_unitkerja = $unitkerja->id;
        //     $mutasiUnitKerja->pekerjaan_awal = "unit kerja";
        //     $mutasiUnitKerja->jabatan_awal = $unitkerja->jabatan;
        //     $mutasiUnitKerja->pekerjaan_tujuan = "unit kerja";
        //     $mutasiUnitKerja->jabatan_tujuan = $request->jabatan_tujuan;
        //     $mutasiUnitKerja->deskripsi = $request->editor;
        //     $mutasiUnitKerja->dimutasi_oleh = Auth::id();
        //     $mutasiUnitKerja->save();

        //     $unitkerja->jabatan = $request->jabatan_tujuan;
        //     $unitkerja->save();
        // }
        // else if($request->cb_pekerjaan == "on" && $request->cb_jabatan == null){
        //     $mutasiUnitKerja = new MutasiUnitKerja();
        //     $mutasiUnitKerja->id_unitkerja = $unitkerja->id;
        //     $mutasiUnitKerja->pekerjaan_awal = "unit kerja";
        //     $mutasiUnitKerja->jabatan_awal = $unitkerja->jabatan;
        //     $mutasiUnitKerja->pekerjaan_tujuan = "pegawai";
        //     $mutasiUnitKerja->jabatan_tujuan = $unitkerja->jabatan;
        //     $mutasiUnitKerja->deskripsi = $request->editor;
        //     $mutasiUnitKerja->dimutasi_oleh = Auth::id();
        //     $mutasiUnitKerja->save();

        //     $user = User::where('id', $unitkerja->id_user)->first();
        //     $user->role = "pegawai";
        //     $user->save();

        //     $unitkerja->status = 0;
        //     $unitkerja->save();

        //     //cek apakah pernah menjadi pegawai
        //     $tmp = DataPegawai::where('id_user', $unitkerja->id_user)->first();
        //     if($tmp == null){
        //         $pegawai = new DataPegawai();
        //     }
        //     else{
        //         $pegawai = DataPegawai::where('id_user', $unitkerja->id_user)->first();
        //     }

        //     $pegawai->nip = $unitkerja->nip;
        //     $pegawai->nama = $unitkerja->nama;
        //     $pegawai->alamat = $unitkerja->alamat;
        //     $pegawai->tempat_lahir = $unitkerja->tempat_lahir;
        //     $pegawai->tanggal_lahir = $unitkerja->tanggal_lahir;
        //     $pegawai->no_ktp = $unitkerja->no_ktp;
        //     $pegawai->jenis_kelamin = $unitkerja->jenis_kelamin;
        //     $pegawai->status = 1;
        //     $pegawai->jabatan = $unitkerja->jabatan;
        //     $pegawai->agama = $unitkerja->agama;
        //     $pegawai->no_hp = $unitkerja->no_hp;
        //     $pegawai->email = $unitkerja->email;
        //     $pegawai->foto_diri = $unitkerja->foto_diri;
        //     $pegawai->tanggal_sk = $unitkerja->tanggal_sk;
        //     $pegawai->pendidikan = $unitkerja->pendidikan;
        //     $pegawai->program_studi = $unitkerja->program_studi;
        //     $pegawai->tahun_kelulusan = $unitkerja->tahun_kelulusan;
        //     $pegawai->id_user = $unitkerja->id_user;
        //     $pegawai->id_pelamar = $unitkerja->id_pelamar;
        //     $pegawai->save();
        // }
        // else if($request->cb_pekerjaan == "on" && $request->cb_jabatan == "on"){
        //     $this->validate($request, [ 
        //         'jabatan_tujuan' => 'required', 
        //     ]);

        //     $mutasiUnitKerja = new MutasiUnitKerja();
        //     $mutasiUnitKerja->id_unitkerja = $unitkerja->id;
        //     $mutasiUnitKerja->pekerjaan_awal = "unit kerja";
        //     $mutasiUnitKerja->jabatan_awal = $unitkerja->jabatan;
        //     $mutasiUnitKerja->pekerjaan_tujuan = "pegawai";
        //     $mutasiUnitKerja->jabatan_tujuan = $request->jabatan_tujuan;
        //     $mutasiUnitKerja->deskripsi = $request->editor;
        //     $mutasiUnitKerja->dimutasi_oleh = Auth::id();
        //     $mutasiUnitKerja->save();
            
        //     $user = User::where('id', $unitkerja->id_user)->first();
        //     $user->role = "pegawai";
        //     $user->save();
            
        //     $unitkerja->jabatan = $request->jabatan_tujuan;
        //     $unitkerja->status = 0;
        //     $unitkerja->save();

        //     //cek apakah pernah menjadi pegawai
        //     $tmp = DataPegawai::where('id_user', $unitkerja->id_user)->first();
        //     if($tmp == null){
        //         $pegawai = new DataPegawai();
        //     }
        //     else{
        //         $pegawai = DataPegawai::where('id_user', $unitkerja->id_user)->first();
        //     }

        //     $pegawai->nip = $unitkerja->nip;
        //     $pegawai->nama = $unitkerja->nama;
        //     $pegawai->alamat = $unitkerja->alamat;
        //     $pegawai->tempat_lahir = $unitkerja->tempat_lahir;
        //     $pegawai->tanggal_lahir = $unitkerja->tanggal_lahir;
        //     $pegawai->no_ktp = $unitkerja->no_ktp;
        //     $pegawai->jenis_kelamin = $unitkerja->jenis_kelamin;
        //     $pegawai->status = 1;
        //     $pegawai->jabatan = $unitkerja->jabatan;
        //     $pegawai->agama = $unitkerja->agama;
        //     $pegawai->no_hp = $unitkerja->no_hp;
        //     $pegawai->email = $unitkerja->email;
        //     $pegawai->foto_diri = $unitkerja->foto_diri;
        //     $pegawai->tanggal_sk = $unitkerja->tanggal_sk;
        //     $pegawai->pendidikan = $unitkerja->pendidikan;
        //     $pegawai->program_studi = $unitkerja->program_studi;
        //     $pegawai->tahun_kelulusan = $unitkerja->tahun_kelulusan;
        //     $pegawai->id_user = $unitkerja->id_user;
        //     $pegawai->id_pelamar = $unitkerja->id_pelamar;
        //     $pegawai->save();
        // }

        // if($request->cb_pekerjaan != null || $request->cb_jabatan != null){
        //     $mutasiUnitKerja = DB::table('tbl_mutasi_unitkerja')
        //             ->join('tbl_dataunitkerja', 'tbl_mutasi_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
        //             ->join('users', 'tbl_mutasi_unitkerja.dimutasi_oleh', '=', 'users.id')
        //             ->select(DB::raw('tbl_mutasi_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, users.name as nama_dimutasi_oleh'))
        //             ->orderBy('tbl_mutasi_unitkerja.id', 'desc')
        //             ->first();

        //     $pdf = PDF::loadView('pdf/surat-keterangan-pindah-unit-unitkerja', compact('mutasiUnitKerja'));

        //     //make direktori
        //     $path = public_path().'/storage/mutasi';
        //     if(!File_exists($path)){
        //         File::makeDirectory($path, $mode = 0777, true, true);
        //     }

        //     $namefile = 'surat_keterangan_pindah_unit'. date("Y_m_d_H_i_s") .'.pdf';
        //     $inputs['surat_keterangan_pindah_unit'] = 'storage/mutasi/'.$namefile;
        //     $pdf->save($inputs['surat_keterangan_pindah_unit']);

        //     $tmp = MutasiUnitKerja::where('id', $mutasiUnitKerja->id)->first();

        //     $tmp->surat_keterangan_pindah_unit = $inputs['surat_keterangan_pindah_unit'];
        //     $tmp->save(); 
        // }

        // if($request->cb_pekerjaan == null && $request->cb_jabatan == null){
        //     return redirect()->route("admin.mutasi-unitkerja.create")->with( 
        //     "failed", 
        //     "Data gagal disimpan." 
        //     ); 
        // }
        // else if($request->cb_pekerjaan == null && $request->cb_jabatan == "on"){
        //     $this->validate($request, [ 
        //         'jabatan_tujuan' => 'required', 
        //     ]);

        //     $mutasiUnitKerja = new MutasiUnitKerja();
        //     $mutasiUnitKerja->id_unitkerja = $unitkerja->id;
        //     $mutasiUnitKerja->pekerjaan_awal = "unit kerja";
        //     $mutasiUnitKerja->jabatan_awal = $unitkerja->jabatan;
        //     $mutasiUnitKerja->pekerjaan_tujuan = "unit kerja";
        //     $mutasiUnitKerja->jabatan_tujuan = $request->jabatan_tujuan;
        //     $mutasiUnitKerja->deskripsi = $request->editor;
        //     $mutasiUnitKerja->dimutasi_oleh = Auth::id();
        //     $mutasiUnitKerja->save();

        //     $unitkerja->jabatan = $request->jabatan_tujuan;
        //     $unitkerja->save();
        // }
        // else if($request->cb_pekerjaan == "on" && $request->cb_jabatan == null){
        //     $mutasiUnitKerja = new MutasiUnitKerja();
        //     $mutasiUnitKerja->id_unitkerja = $unitkerja->id;
        //     $mutasiUnitKerja->pekerjaan_awal = "unit kerja";
        //     $mutasiUnitKerja->jabatan_awal = $unitkerja->jabatan;
        //     $mutasiUnitKerja->pekerjaan_tujuan = "pegawai";
        //     $mutasiUnitKerja->jabatan_tujuan = $unitkerja->jabatan;
        //     $mutasiUnitKerja->deskripsi = $request->editor;
        //     $mutasiUnitKerja->dimutasi_oleh = Auth::id();
        //     $mutasiUnitKerja->save();

        //     $user = User::where('id', $unitkerja->id_user)->first();
        //     $user->role = "pegawai";
        //     $user->save();

        //     $unitkerja->status = 0;
        //     $unitkerja->save();

        //     //cek apakah pernah menjadi pegawai
        //     $tmp = DataPegawai::where('id_user', $unitkerja->id_user)->first();
        //     if($tmp == null){
        //         $pegawai = new DataPegawai();
        //     }
        //     else{
        //         $pegawai = DataPegawai::where('id_user', $unitkerja->id_user)->first();
        //     }

        //     $pegawai->nip = $unitkerja->nip;
        //     $pegawai->nama = $unitkerja->nama;
        //     $pegawai->alamat = $unitkerja->alamat;
        //     $pegawai->tempat_lahir = $unitkerja->tempat_lahir;
        //     $pegawai->tanggal_lahir = $unitkerja->tanggal_lahir;
        //     $pegawai->no_ktp = $unitkerja->no_ktp;
        //     $pegawai->jenis_kelamin = $unitkerja->jenis_kelamin;
        //     $pegawai->status = 1;
        //     $pegawai->jabatan = $unitkerja->jabatan;
        //     $pegawai->agama = $unitkerja->agama;
        //     $pegawai->no_hp = $unitkerja->no_hp;
        //     $pegawai->email = $unitkerja->email;
        //     $pegawai->foto_diri = $unitkerja->foto_diri;
        //     $pegawai->tanggal_sk = $unitkerja->tanggal_sk;
        //     $pegawai->pendidikan = $unitkerja->pendidikan;
        //     $pegawai->program_studi = $unitkerja->program_studi;
        //     $pegawai->tahun_kelulusan = $unitkerja->tahun_kelulusan;
        //     $pegawai->id_user = $unitkerja->id_user;
        //     $pegawai->id_pelamar = $unitkerja->id_pelamar;
        //     $pegawai->save();
        // }
        // else if($request->cb_pekerjaan == "on" && $request->cb_jabatan == "on"){
        //     $this->validate($request, [ 
        //         'jabatan_tujuan' => 'required', 
        //     ]);

        //     $mutasiUnitKerja = new MutasiUnitKerja();
        //     $mutasiUnitKerja->id_unitkerja = $unitkerja->id;
        //     $mutasiUnitKerja->pekerjaan_awal = "unit kerja";
        //     $mutasiUnitKerja->jabatan_awal = $unitkerja->jabatan;
        //     $mutasiUnitKerja->pekerjaan_tujuan = "pegawai";
        //     $mutasiUnitKerja->jabatan_tujuan = $request->jabatan_tujuan;
        //     $mutasiUnitKerja->deskripsi = $request->editor;
        //     $mutasiUnitKerja->dimutasi_oleh = Auth::id();
        //     $mutasiUnitKerja->save();
            
        //     $user = User::where('id', $unitkerja->id_user)->first();
        //     $user->role = "pegawai";
        //     $user->save();
            
        //     $unitkerja->jabatan = $request->jabatan_tujuan;
        //     $unitkerja->status = 0;
        //     $unitkerja->save();

        //     //cek apakah pernah menjadi pegawai
        //     $tmp = DataPegawai::where('id_user', $unitkerja->id_user)->first();
        //     if($tmp == null){
        //         $pegawai = new DataPegawai();
        //     }
        //     else{
        //         $pegawai = DataPegawai::where('id_user', $unitkerja->id_user)->first();
        //     }

        //     $pegawai->nip = $unitkerja->nip;
        //     $pegawai->nama = $unitkerja->nama;
        //     $pegawai->alamat = $unitkerja->alamat;
        //     $pegawai->tempat_lahir = $unitkerja->tempat_lahir;
        //     $pegawai->tanggal_lahir = $unitkerja->tanggal_lahir;
        //     $pegawai->no_ktp = $unitkerja->no_ktp;
        //     $pegawai->jenis_kelamin = $unitkerja->jenis_kelamin;
        //     $pegawai->status = 1;
        //     $pegawai->jabatan = $unitkerja->jabatan;
        //     $pegawai->agama = $unitkerja->agama;
        //     $pegawai->no_hp = $unitkerja->no_hp;
        //     $pegawai->email = $unitkerja->email;
        //     $pegawai->foto_diri = $unitkerja->foto_diri;
        //     $pegawai->tanggal_sk = $unitkerja->tanggal_sk;
        //     $pegawai->pendidikan = $unitkerja->pendidikan;
        //     $pegawai->program_studi = $unitkerja->program_studi;
        //     $pegawai->tahun_kelulusan = $unitkerja->tahun_kelulusan;
        //     $pegawai->id_user = $unitkerja->id_user;
        //     $pegawai->id_pelamar = $unitkerja->id_pelamar;
        //     $pegawai->save();
        // }

        // if($request->cb_pekerjaan != null || $request->cb_jabatan != null){
        //     $mutasiUnitKerja = DB::table('tbl_mutasi_unitkerja')
        //             ->join('tbl_dataunitkerja', 'tbl_mutasi_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
        //             ->join('users', 'tbl_mutasi_unitkerja.dimutasi_oleh', '=', 'users.id')
        //             ->select(DB::raw('tbl_mutasi_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, users.name as nama_dimutasi_oleh'))
        //             ->orderBy('tbl_mutasi_unitkerja.id', 'desc')
        //             ->first();

        //     $pdf = PDF::loadView('pdf/surat-keterangan-pindah-unit-unitkerja', compact('mutasiUnitKerja'));

        //     //make direktori
        //     $path = public_path().'/storage/mutasi';
        //     if(!File_exists($path)){
        //         File::makeDirectory($path, $mode = 0777, true, true);
        //     }

        //     $namefile = 'surat_keterangan_pindah_unit'. date("Y_m_d_H_i_s") .'.pdf';
        //     $inputs['surat_keterangan_pindah_unit'] = 'storage/mutasi/'.$namefile;
        //     $pdf->save($inputs['surat_keterangan_pindah_unit']);

        //     $tmp = MutasiUnitKerja::where('id', $mutasiUnitKerja->id)->first();

        //     $tmp->surat_keterangan_pindah_unit = $inputs['surat_keterangan_pindah_unit'];
        //     $tmp->save(); 
        // }

        $mutasiUnitKerja = new MutasiUnitKerja();
        $mutasiUnitKerja->id_unitkerja = $unitkerja->id;
        $mutasiUnitKerja->id_kategori_unit_kerja_sebelum = $unitkerja->id_kategori_unit_kerja;
        $mutasiUnitKerja->id_kategori_unit_kerja_sesudah = $request->kategori_unit_kerja;
        $mutasiUnitKerja->deskripsi = $request->editor;
        $mutasiUnitKerja->dimutasi_oleh = Auth::id();
        $mutasiUnitKerja->save();
            
        $unitkerja->id_kategori_unit_kerja = $request->kategori_unit_kerja;
        $unitkerja->save();

        $mutasiUnitKerja = DB::table('tbl_mutasi_unitkerja')
                    ->join('tbl_dataunitkerja', 'tbl_mutasi_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->join('users', 'tbl_mutasi_unitkerja.dimutasi_oleh', '=', 'users.id')
                    ->join('tbl_kategori_unit_kerja as a', 'tbl_mutasi_unitkerja.id_kategori_unit_kerja_sebelum', '=', 'a.id')
                    ->join('tbl_kategori_unit_kerja as b', 'tbl_mutasi_unitkerja.id_kategori_unit_kerja_sesudah', '=', 'b.id')
                    ->select(DB::raw('tbl_mutasi_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, users.name as nama_dimutasi_oleh, a.nama as kategori_unit_kerja_sebelum, b.nama as kategori_unit_kerja_sesudah'))
                    ->orderBy('tbl_mutasi_unitkerja.id', 'desc')
                    ->first();

        $pdf = PDF::loadView('pdf/surat-keterangan-pindah-unit-unitkerja', compact('mutasiUnitKerja'));

        //make direktori
        $path = public_path().'/storage/mutasi';
        if(!File_exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $namefile = 'surat_keterangan_pindah_unit'. date("Y_m_d_H_i_s") .'.pdf';
        $inputs['surat_keterangan_pindah_unit'] = 'storage/mutasi/'.$namefile;
        $pdf->save($inputs['surat_keterangan_pindah_unit']);

        $tmp = MutasiUnitKerja::where('id', $mutasiUnitKerja->id)->first();

        $tmp->surat_keterangan_pindah_unit = $inputs['surat_keterangan_pindah_unit'];
        $tmp->save();

        return redirect()->route("admin.mutasi-unitkerja.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 
}
