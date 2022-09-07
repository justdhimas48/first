<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Datapelamar; 
// namespace App\Http\Controllers; 
// use Illuminate\Http\Request; 
use App\User; 
// use App\Datapelamar; 
// use App\Datapengajuan; 
use Hash; 
class DatapelamarController extends Controller 
{ 
 
 public function index() 
 { 
 //ambil data max 10 
//  $tampil = Datapelamar::paginate(10); 
 //membuat variabel tampil yang diisi dengan data 
//  foreach ($data as $item) { 
//  $item->datapelamar = DataPelamar::find($item->id_kelas); 
//  $item->user = Datapelamar::find($item->id_user); 
//  } 
//  $tampil['data'] = $data; 
 //tampilkan resources/views/siswa/index.blade.php beserta variabel tampil 
//  return view("datapelamar.index", $tampil); 
$tampil = Datapelamar::paginate(10);
return view('datapelamar.index',compact('tampil'));
 } 
 public function create() 
 { 
 //tampilkan resources/views/siswa/create.blade.php 
 $data['datapelamar'] = Datapelamar::get(); 
 return view("datapelamar.create",$data); 
 } 
 public function store(Request $request) 
 { 
 //validasi inputan 
 $this->validate($request, [ 
 'pi' => 'required|unique:datapelamars',  
 'nama' => 'required', 
 'ttl' => 'required', 
 'usia' => 'required', 
 'jk' => 'required', 
 'email' => 'required|email|unique:users', 
 'hp' => 'required', 
 'medsos' => 'required', 
 'pendidikan_terakhir' => 'required', 
 'nama_instansi' => 'required', 
 'tahun_masuk' => 'required', 
 'tahun_lulus' => 'required', 
 'penghargaan' => 'required', 
 'nama_perusahaan' => 'required', 
 'posisi' => 'required', 
 'identitas_atasan' => 'required', 
 'gaji_terakhir' => 'required', 
 'jenis_pekerjaan' => 'required', 
 'keahlian_utama' => 'required', 
 'fc_kk' => 'required', 
 'fc_ktp' => 'required', 
 'fc_ijazah' => 'required', 
 'transkrip_nilai' => 'required', 
 'foto' => 'required', 
 'skck' => 'required', 
 'surat_keterangan_sehat' => 'required', 
 'sertifikat' => 'required', 
 'surat_keterangan_pengalaman_kerja' => 'required', 
 'password' => 'required', 
 ]);
 //enkripsi password 
 $enkripsi = Hash::make($request->password);
 $request->merge(['password' => $enkripsi]);
 //isi name dengan nama 
 $request->merge(['name' => $request->nama]); 
 //isi hak_akses dengan 'siswa' 
 $request->merge(['hak_akses' => "datapelamar"]); 
 //buat data User 
 $dataUser = User::create($request->all()); 
 //isi id_siswa 
 $request->merge(['id_user' => $dataUser->id]); 
 
 //buat data siswa 
 $data = Datapelamar::create($request->all()); 
 return redirect()->route("datapelamar.index")->with( 
 "success", 
 "Data berhasil disimpan." 
 ); 
 } 
 public function show($datapelamar) 
 { 
 // 
 } 
 public function edit($datapelamar) 
 { 
 $data = Datapelamar::findOrFail($datapelamar); 
 $data->datapelamar = Datapelamar::get(); 
 $data->user = User::find($data->id_user); 
 //tampilkan resources/views/datapelamar/edit.blade.php 
 return view("datapelamar.edit", $data); 
 } 
 public function update(Request $request, $datapelamar) 
 { 
 //validasi inputan 
 $this->validate($request, [ 
    'pi' => 'required|unique:datapelamars',  
    'nama' => 'required', 
    'ttl' => 'required', 
    'usia' => 'required', 
    'jk' => 'required', 
    'email' => 'required|email|unique:users', 
    'hp' => 'required', 
    'medsos' => 'required', 
    'pendidikan_terakhir' => 'required', 
    'nama_instansi' => 'required', 
    'tahun_masuk' => 'required', 
    'tahun_lulus' => 'required', 
    'penghargaan' => 'required', 
    'nama_perusahaan' => 'required', 
    'posisi' => 'required', 
    'identitas_atasan' => 'required', 
    'gaji_terakhir' => 'required', 
    'jenis_pekerjaan' => 'required', 
    'keahlian_utama' => 'required', 
    'fc_kk' => 'required', 
    'fc_ktp' => 'required', 
    'fc_ijazah' => 'required', 
    'transkrip_nilai' => 'required', 
    'foto' => 'required', 
    'skck' => 'required', 
    'surat_keterangan_sehat' => 'required', 
    'sertifikat' => 'required', 
    'surat_keterangan_pengalaman_kerja' => 'required',   
 ]); 
 $dataDatapelamar = Datapelamar::findOrFail($datapelamar); 
 $dataDatapelamar->pi = $request->pi; 
 $dataDatapelamar->nama = $request->nama; 
 $dataDatapelamar->ttl = $request->ttl; 
 $dataDatapelamar->usia = $request->usia; 
 $dataDatapelamar->jk = $request->jk;
 $dataDatapelamar->email = $request->email;
 $dataDatapelamar->hp = $request->hp;
 $dataDatapelamar->medsos = $request->medsos;
 $dataDatapelamar->pendidikan_terakhir = $request->pendidikan_terakhir;
 $dataDatapelamar->nama_instansi = $request->nama_instansi;
 $dataDatapelamar->tahun_masuk = $request->tahun_masuk;
 $dataDatapelamar->tahun_lulus = $request->tahun_lulus;
 $dataDatapelamar->penghargaan = $request->penghargaan;
 $dataDatapelamar->nama_perusahaan = $request->nama_perusahaan;
 $dataDatapelamar->posisi = $request->posisi;
 $dataDatapelamar->identitas_atasan = $request->identitas_atasan;
 $dataDatapelamar->gaji_terakhir = $request->gaji_terakhir;
 $dataDatapelamar->jenis_pekerjaan = $request->jenis_pekerjaan;
 $dataDatapelamar->keahlian_utama = $request->keahlian_utama;
 $dataDatapelamar->fc_kk = $request->fc_kk;
 $dataDatapelamar->fc_ktp = $request->fc_ktp;
 $dataDatapelamar->fc_ijazah = $request->fc_ijazah;
 $dataDatapelamar->transkrip_nilai = $request->transkrip_nilai;
 $dataDatapelamar->foto = $request->foto;
 $dataDatapelamar->skck = $request->skck;
 $dataDatapelamar->surat_keterangan_sehat = $request->surat_keterangan_sehat;
 $dataDatapelamar->sertifikat = $request->sertifikat;
 $dataDatapelamar->surat_keterangan_pengalaman_kerja = $request->surat_keterangan_pengalaman_kerja;
 $dataDatapelamar->save(); 
 $dataUser = User::findOrFail($dataSiswa->id_user); 
 $dataUser->name = $request->nama; 
 $dataUser->email = $request->email;
 //jika password tidak kosong 
 if ($request->password!="") { 
    $enkripsi = Hash::make($request->password); 
    $dataUser->password = $enkripsi; 
    } 
    $dataUser->save(); 
    
    return redirect()->route("datapelamar.index")->with( 
    "success", 
    "Data berhasil diubah." 
    ); 
    } 
    
    public function destroy($datapelamar) 
    { 
    $dataDatapelamar = Datapelamar::findOrFail($datapelamar); 
    $dataDatapelamar->delete(); 
    $dataUser = User::findOrFail($dataDatapelamar->id_user); 
    $dataUser->delete(); 
    } 
   } 