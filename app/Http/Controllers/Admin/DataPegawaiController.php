<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DataPegawai;
use App\Models\KontrakPegawai;
use Illuminate\Support\Facades\DB;
use Hash;
use Carbon\Carbon;

class DataPegawaiController extends Controller
{
    public function index(Request $request)
    {
        $pegawai = DataPegawai::where('tbl_datapegawai.jabatan', '=', 'dosen')
            ->whereRaw('tbl_datapegawai.jurusan LIKE "%' . $request->search . '%"')
            ->paginate(10);

        foreach($pegawai as $v){
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $v->created_at);
            $from = Carbon::createFromFormat('Y-m-d', $v->tanggal_sk);
            $diff_in_months = $to->diffInMonths($from);
            $v->lama_bekerja = $diff_in_months;
        }
        return view('admin.data-pegawai.index', compact('pegawai'));
    }

    public function print(Request $request)
    {
        $pegawai = DataPegawai::where('tbl_datapegawai.jabatan', '=', 'dosen')
            ->whereRaw('tbl_datapegawai.jurusan LIKE "%' . $request->search . '%"')
            ->paginate(10);

        foreach($pegawai as $v){
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $v->created_at);
            $from = Carbon::createFromFormat('Y-m-d', $v->tanggal_sk);
            $diff_in_months = $to->diffInMonths($from);
            $v->lama_bekerja = $diff_in_months;
        }
 
       return view('pdf.data-pegawai-print', compact('pegawai'));
    }
    
    public function indexKaryawan(Request $request)
    {
        $pegawai = DataPegawai::where('tbl_datapegawai.jabatan', '=', 'karyawan')
            ->whereRaw('tbl_datapegawai.jurusan LIKE "%' . $request->search . '%"')
            ->paginate(10);

        foreach($pegawai as $v){
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $v->created_at);
            $from = Carbon::createFromFormat('Y-m-d', $v->tanggal_sk);
            $diff_in_months = $to->diffInMonths($from);
            $v->lama_bekerja = $diff_in_months;
        }
        return view('admin.data-pegawai.index-karyawan', compact('pegawai'));
    }

    public function printKaryawan(Request $request)
    {
        $pegawai = DataPegawai::where('tbl_datapegawai.jabatan', '=', 'karyawan')
            ->whereRaw('tbl_datapegawai.jurusan LIKE "%' . $request->search . '%"')
            ->paginate(10);

        foreach($pegawai as $v){
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $v->created_at);
            $from = Carbon::createFromFormat('Y-m-d', $v->tanggal_sk);
            $diff_in_months = $to->diffInMonths($from);
            $v->lama_bekerja = $diff_in_months;
        }
 
       return view('pdf.data-pegawai-print', compact('pegawai'));
    }

    public function printDataKaryawan(Request $request)
    {
        $pegawai = DB::table('tbl_datapegawai')
        ->join('tbl_kontrak_pegawai', 'tbl_kontrak_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
        ->join('tbl_kategori_unit_kerja', 'tbl_kategori_unit_kerja.id', '=', 'tbl_datapegawai.id_kategori_unit_kerja')
        ->select(DB::raw('tbl_datapegawai.*, tbl_kontrak_pegawai.lama_kontrak as lama_kontrak, tbl_kategori_unit_kerja.nama as kategori_unit_kerja'))
        ->where('tbl_datapegawai.id', $request->id)->first();
 
       return view('pdf.detail-pegawai-print', compact('pegawai'));
    }

    public function edit($id)
    {
        $pegawai = DB::table('tbl_datapegawai')
            ->join('tbl_kontrak_pegawai', 'tbl_kontrak_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
            ->join('tbl_kategori_unit_kerja', 'tbl_kategori_unit_kerja.id', '=', 'tbl_datapegawai.id_kategori_unit_kerja')
            ->select(DB::raw('tbl_datapegawai.*, tbl_kontrak_pegawai.lama_kontrak as lama_kontrak, tbl_kategori_unit_kerja.nama as kategori_unit_kerja'))
            ->where('tbl_datapegawai.id', $id)->first();
        return view('admin.data-pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nip' => 'required',
            'no_ktp' => 'required',
            'lama_kontrak' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'agama' => 'required',
            'no_hp' => 'required',
            // 'pendidikan' => 'required',
            'tahun_kelulusan' => 'required',
        ]);
        $pegawai = DataPegawai::where('id', $id)->first();
        $user = User::where('id', $pegawai->id_user)->first();

        $pegawai->nip = $request->nip;
        $pegawai->no_ktp = $request->no_ktp;
        $pegawai->nama = $request->nama;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->jenis_kelamin = ($request->jenis_kelamin == "Laki-Laki") ? 0 : 1;
        $pegawai->alamat = $request->alamat;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->agama = $request->agama;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->pendidikan_s1 = $request->pendidikan_s1;
        $pegawai->pendidikan_s2 = $request->pendidikan_s2;
        $pegawai->pendidikan_s3 = $request->pendidikan_s3;
        $pegawai->nama_istri_suami = $request->nama_istri_suami;
        $pegawai->nama_anak = $request->nama_anak;
        $pegawai->nama_ayah = $request->nama_ayah;
        $pegawai->nama_ibu = $request->nama_ibu;
        $pegawai->keterangan_bpjs = $request->keterangan_bpjs;
        // $pegawai->pendidikan = $request->pendidikan;
        $pegawai->tahun_kelulusan = $request->tahun_kelulusan;

        if ($request->foto_bpjs) {
            $filenameLama = explode("/", $pegawai->foto_bpjs);
            \Storage::disk('public')->delete('pegawai/' . $user->id . '/' . $filenameLama[count($filenameLama) - 1]);

            $namefile = 'bpjs_' . date("Y_m_d_H_i_s") . '.' . $request->foto_bpjs->extension();
            $inputs['foto_bpjs'] = 'storage/pegawai/' . $user->id . '/' . $namefile;
            request('foto_bpjs')->storeAs('pegawai/' . $user->id, $namefile, 'public');
            $pegawai->foto_bpjs = $inputs['foto_bpjs'];
        }

        if ($request->foto_npwp) {
            $filenameLama = explode("/", $pegawai->foto_npwp);
            \Storage::disk('public')->delete('pegawai/' . $user->id . '/' . $filenameLama[count($filenameLama) - 1]);

            $namefile = 'diri_' . date("Y_m_d_H_i_s") . '.' . $request->foto_npwp->extension();
            $inputs['foto_npwp'] = 'storage/pegawai/' . $user->id . '/' . $namefile;
            request('foto_npwp')->storeAs('pegawai/' . $user->id, $namefile, 'public');
            $pegawai->foto_npwp = $inputs['foto_npwp'];
        }

        if ($request->foto_diri) {
            $filenameLama = explode("/", $pegawai->foto_diri);
            \Storage::disk('public')->delete('pegawai/' . $user->id . '/' . $filenameLama[count($filenameLama) - 1]);

            $namefile = 'diri_' . date("Y_m_d_H_i_s") . '.' . $request->foto_diri->extension();
            $inputs['foto_diri'] = 'storage/pegawai/' . $user->id . '/' . $namefile;
            request('foto_diri')->storeAs('pegawai/' . $user->id, $namefile, 'public');
            $pegawai->foto_diri = $inputs['foto_diri'];
        }

        if ($request->program_studi) {
            $pegawai->program_studi = $request->program_studi;
        }

        $user->name = $request->nama;

        if ($request->password != "") {

            $this->validate($request, [
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);

            $enkripsi = Hash::make($request->password);
            $user->password = $enkripsi;
        }

        $kontrakPegawai = KontrakPegawai::where('id_pegawai', $id)->first();
        $kontrakPegawai->lama_kontrak = $request->lama_kontrak;

        $kontrakPegawai->save();
        $pegawai->save();
        $user->save();

        return redirect()->route("admin.data-pegawai.index")->with(
            "success",
            "Data berhasil disimpan."
        );
    }
}
