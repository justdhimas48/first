<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPegawai; 
use App\Models\DataUnitKerja; 
use App\Models\MutasiPegawai; 
use App\Models\User; 
use App\Models\KategoriUnitKerja; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class MutasiPegawaiController extends Controller
{
    public function index() {
        $mutasiPegawai = DB::table('tbl_mutasi_pegawai')
                    ->join('tbl_datapegawai', 'tbl_mutasi_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->join('tbl_kategori_unit_kerja as a', 'tbl_mutasi_pegawai.id_kategori_unit_kerja_sebelum', '=', 'a.id')
                    ->join('tbl_kategori_unit_kerja as b', 'tbl_mutasi_pegawai.id_kategori_unit_kerja_sesudah', '=', 'b.id')
                    ->select(DB::raw('tbl_mutasi_pegawai.*, tbl_datapegawai.nama as nama_pegawai, a.nama as kategori_unit_kerja_sebelum, b.nama as kategori_unit_kerja_sesudah'))
                    ->paginate(10);
        return view('admin.mutasi-pegawai.index', compact('mutasiPegawai'));
    }

    public function detail($id){
        $mutasiPegawai = DB::table('tbl_mutasi_pegawai')
                    ->join('tbl_datapegawai', 'tbl_mutasi_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->join('users', 'tbl_mutasi_pegawai.dimutasi_oleh', '=', 'users.id')
                    ->join('tbl_kategori_unit_kerja as a', 'tbl_mutasi_pegawai.id_kategori_unit_kerja_sebelum', '=', 'a.id')
                    ->join('tbl_kategori_unit_kerja as b', 'tbl_mutasi_pegawai.id_kategori_unit_kerja_sesudah', '=', 'b.id')
                    ->select(DB::raw('tbl_mutasi_pegawai.*, tbl_datapegawai.nama as nama_pegawai, users.name as nama_dimutasi_oleh, a.nama as kategori_unit_kerja_sebelum, b.nama as kategori_unit_kerja_sesudah'))
                    ->where('tbl_mutasi_pegawai.id', $id)
                    ->first();
        return view('admin.mutasi-pegawai.detail', compact('mutasiPegawai'));
    }

    public function create(){
        $pegawai = DataPegawai::join('tbl_kategori_unit_kerja', 'tbl_kategori_unit_kerja.id', '=', 'tbl_datapegawai.id_kategori_unit_kerja')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_kategori_unit_kerja.nama as nama_kategori_unit_kerja'))
                    ->where('status', 1)
                    ->get();
        $kategoriUnitKerja = KategoriUnitKerja::where('is_actived', 1)->get();
        return view('admin.mutasi-pegawai.create', compact('pegawai', 'kategoriUnitKerja'));
    }
    
    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'pegawai' => 'required', 
            'editor' => 'required',
            'lampiran' => 'required',
            'kategori_unit_kerja' => 'required', 
        ]);

        $pegawai = DataPegawai::where('id', $request->pegawai)->first();

        //Jika tidak memilih jenis mutasi
        // if($request->cb_pekerjaan == null && $request->cb_jabatan == null){
        //     return redirect()->route("admin.mutasi-pegawai.create")->with( 
        //     "failed", 
        //     "Data gagal disimpan." 
        //     ); 
        // }
        // else if($request->cb_pekerjaan == null && $request->cb_jabatan == "on"){
        //     $this->validate($request, [ 
        //         'jabatan_tujuan' => 'required', 
        //     ]);

        //     $mutasiPegawai = new MutasiPegawai();
        //     $mutasiPegawai->id_pegawai = $pegawai->id;
        //     $mutasiPegawai->pekerjaan_awal = "pegawai";
        //     $mutasiPegawai->jabatan_awal = $pegawai->jabatan;
        //     $mutasiPegawai->pekerjaan_tujuan = "pegawai";
        //     $mutasiPegawai->jabatan_tujuan = $request->jabatan_tujuan;
        //     $mutasiPegawai->deskripsi = $request->editor;
        //     $mutasiPegawai->dimutasi_oleh = Auth::id();
        //     $mutasiPegawai->save();

        //     $pegawai->jabatan = $request->jabatan_tujuan;
        //     $pegawai->save();
        // }
        // else if($request->cb_pekerjaan == "on" && $request->cb_jabatan == null){
        //     $mutasiPegawai = new MutasiPegawai();
        //     $mutasiPegawai->id_pegawai = $pegawai->id;
        //     $mutasiPegawai->pekerjaan_awal = "pegawai";
        //     $mutasiPegawai->jabatan_awal = $pegawai->jabatan;
        //     $mutasiPegawai->pekerjaan_tujuan = "unit kerja";
        //     $mutasiPegawai->jabatan_tujuan = $pegawai->jabatan;
        //     $mutasiPegawai->deskripsi = $request->editor;
        //     $mutasiPegawai->dimutasi_oleh = Auth::id();
        //     $mutasiPegawai->save();

        //     $user = User::where('id', $pegawai->id_user)->first();
        //     $user->role = "unitkerja";
        //     $user->save();

        //     $pegawai->status = 0;
        //     $pegawai->save();

        //     //cek apakah pernah menjadi unit kerja
        //     $tmp = DataUnitKerja::where('id_user', $pegawai->id_user)->first();
        //     if($tmp == null){
        //         $unitkerja = new DataUnitKerja();
        //     }
        //     else{
        //         $unitkerja = DataUnitKerja::where('id_user', $pegawai->id_user)->first();
        //     }

        //     $unitkerja->nip = $pegawai->nip;
        //     $unitkerja->nama = $pegawai->nama;
        //     $unitkerja->alamat = $pegawai->alamat;
        //     $unitkerja->tempat_lahir = $pegawai->tempat_lahir;
        //     $unitkerja->tanggal_lahir = $pegawai->tanggal_lahir;
        //     $unitkerja->no_ktp = $pegawai->no_ktp;
        //     $unitkerja->jenis_kelamin = $pegawai->jenis_kelamin;
        //     $unitkerja->status = 1;
        //     $unitkerja->jabatan = $pegawai->jabatan;
        //     $unitkerja->agama = $pegawai->agama;
        //     $unitkerja->no_hp = $pegawai->no_hp;
        //     $unitkerja->email = $pegawai->email;
        //     $unitkerja->foto_diri = $pegawai->foto_diri;
        //     $unitkerja->tanggal_sk = $pegawai->tanggal_sk;
        //     $unitkerja->pendidikan = $pegawai->pendidikan;
        //     $unitkerja->program_studi = $pegawai->program_studi;
        //     $unitkerja->tahun_kelulusan = $pegawai->tahun_kelulusan;
        //     $unitkerja->id_user = $pegawai->id_user;
        //     $unitkerja->id_pelamar = $pegawai->id_pelamar;
        //     $unitkerja->save();
        // }
        // else if($request->cb_pekerjaan == "on" && $request->cb_jabatan == "on"){
        //     $this->validate($request, [ 
        //         'jabatan_tujuan' => 'required', 
        //     ]);

        //     $mutasiPegawai = new MutasiPegawai();
        //     $mutasiPegawai->id_pegawai = $pegawai->id;
        //     $mutasiPegawai->pekerjaan_awal = "pegawai";
        //     $mutasiPegawai->jabatan_awal = $pegawai->jabatan;
        //     $mutasiPegawai->pekerjaan_tujuan = "unit kerja";
        //     $mutasiPegawai->jabatan_tujuan = $request->jabatan_tujuan;
        //     $mutasiPegawai->deskripsi = $request->editor;
        //     $mutasiPegawai->dimutasi_oleh = Auth::id();
        //     $mutasiPegawai->save();
            
        //     $user = User::where('id', $pegawai->id_user)->first();
        //     $user->role = "unitkerja";
        //     $user->save();
            
        //     $pegawai->jabatan = $request->jabatan_tujuan;
        //     $pegawai->status = 0;
        //     $pegawai->save();

        //     //cek apakah pernah menjadi unit kerja
        //     $tmp = DataUnitKerja::where('id_user', $pegawai->id_user)->first();
        //     if($tmp == null){
        //         $unitkerja = new DataUnitKerja();
        //     }
        //     else{
        //         $unitkerja = DataUnitKerja::where('id_user', $pegawai->id_user)->first();
        //     }

        //     $unitkerja->nip = $pegawai->nip;
        //     $unitkerja->nama = $pegawai->nama;
        //     $unitkerja->alamat = $pegawai->alamat;
        //     $unitkerja->tempat_lahir = $pegawai->tempat_lahir;
        //     $unitkerja->tanggal_lahir = $pegawai->tanggal_lahir;
        //     $unitkerja->no_ktp = $pegawai->no_ktp;
        //     $unitkerja->jenis_kelamin = $pegawai->jenis_kelamin;
        //     $unitkerja->status = 1;
        //     $unitkerja->jabatan = $pegawai->jabatan;
        //     $unitkerja->agama = $pegawai->agama;
        //     $unitkerja->no_hp = $pegawai->no_hp;
        //     $unitkerja->email = $pegawai->email;
        //     $unitkerja->foto_diri = $pegawai->foto_diri;
        //     $unitkerja->tanggal_sk = $pegawai->tanggal_sk;
        //     $unitkerja->pendidikan = $pegawai->pendidikan;
        //     $unitkerja->program_studi = $pegawai->program_studi;
        //     $unitkerja->tahun_kelulusan = $pegawai->tahun_kelulusan;
        //     $unitkerja->id_user = $pegawai->id_user;
        //     $unitkerja->id_pelamar = $pegawai->id_pelamar;
        //     $unitkerja->save();
        // }

        // if($request->cb_pekerjaan != null || $request->cb_jabatan != null){
        //     $mutasiPegawai = DB::table('tbl_mutasi_pegawai')
        //             ->join('tbl_datapegawai', 'tbl_mutasi_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
        //             ->join('users', 'tbl_mutasi_pegawai.dimutasi_oleh', '=', 'users.id')
        //             ->select(DB::raw('tbl_mutasi_pegawai.*, tbl_datapegawai.nama as nama_pegawai, users.name as nama_dimutasi_oleh'))
        //             ->orderBy('tbl_mutasi_pegawai.id', 'desc')
        //             ->first();

        //     $pdf = PDF::loadView('pdf/surat-keterangan-pindah-unit-pegawai', compact('mutasiPegawai'));

        //     //make direktori
        //     $path = public_path().'/storage/mutasi';
        //     if(!File_exists($path)){
        //         File::makeDirectory($path, $mode = 0777, true, true);
        //     }

        //     $namefile = 'surat_keterangan_pindah_unit'. date("Y_m_d_H_i_s") .'.pdf';
        //     $inputs['surat_keterangan_pindah_unit'] = 'storage/mutasi/'.$namefile;
        //     $pdf->save($inputs['surat_keterangan_pindah_unit']);

        //     $tmp = MutasiPegawai::where('id', $mutasiPegawai->id)->first();

        //     $tmp->surat_keterangan_pindah_unit = $inputs['surat_keterangan_pindah_unit'];
        //     $tmp->save(); 
        // }

        $mutasiPegawai = new MutasiPegawai();
        $mutasiPegawai->id_pegawai = $pegawai->id;
        $mutasiPegawai->id_kategori_unit_kerja_sebelum = $pegawai->id_kategori_unit_kerja;
        $mutasiPegawai->id_kategori_unit_kerja_sesudah = $request->kategori_unit_kerja;
        $mutasiPegawai->deskripsi = $request->editor;
        $mutasiPegawai->dimutasi_oleh = Auth::id();

        if($request->lampiran){
            $namefile = 'lampiran_'. date("Y_m_d_H_i_s") .'.'.$request->lampiran->extension();
            $inputs['lampiran'] = 'storage/mutasi_pegawai/'.$request->pegawai.'/'.$namefile;
            request('lampiran')->storeAs('mutasi_pegawai/'.$request->pegawai, $namefile, 'public');
            $mutasiPegawai->lampiran = $inputs['lampiran'];
        }

        $mutasiPegawai->save();
            
        $pegawai->id_kategori_unit_kerja = $request->kategori_unit_kerja;
        $pegawai->save();

        $mutasiPegawai = DB::table('tbl_mutasi_pegawai')
                    ->join('tbl_datapegawai', 'tbl_mutasi_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->join('users', 'tbl_mutasi_pegawai.dimutasi_oleh', '=', 'users.id')
                    ->join('tbl_kategori_unit_kerja as a', 'tbl_mutasi_pegawai.id_kategori_unit_kerja_sebelum', '=', 'a.id')
                    ->join('tbl_kategori_unit_kerja as b', 'tbl_mutasi_pegawai.id_kategori_unit_kerja_sesudah', '=', 'b.id')
                    ->select(DB::raw('tbl_mutasi_pegawai.*, tbl_datapegawai.nama as nama_pegawai, users.name as nama_dimutasi_oleh, a.nama as kategori_unit_kerja_sebelum, b.nama as kategori_unit_kerja_sesudah'))
                    ->orderBy('tbl_mutasi_pegawai.id', 'desc')
                    ->first();

        $pdf = PDF::loadView('pdf/surat-keterangan-pindah-unit-pegawai', compact('mutasiPegawai'));

        //make direktori
        $path = public_path().'/storage/mutasi';
        if(!File_exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $namefile = 'surat_keterangan_pindah_unit'. date("Y_m_d_H_i_s") .'.pdf';
        $inputs['surat_keterangan_pindah_unit'] = 'storage/mutasi/'.$namefile;
        $pdf->save($inputs['surat_keterangan_pindah_unit']);

        $tmp = MutasiPegawai::where('id', $mutasiPegawai->id)->first();

        $tmp->surat_keterangan_pindah_unit = $inputs['surat_keterangan_pindah_unit'];
        $tmp->save();

        return redirect()->route("admin.mutasi-pegawai.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 
}
