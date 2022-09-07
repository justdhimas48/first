{{ csrf_field() }}

<div class="form-group">
<label for="nama" class="col-sm-2 control-label">Nama</label>
<div class="col-sm-10">
<input type="text" name="nama" class="form-control" value="{{ $nama ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="ttl" class="col-sm-2 control-label">Tempat Tanggal Lahir</label>
<div class="col-sm-10">
<input type="text" name="ttl" class="form-control" value="{{ $ttl ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="usia" class="col-sm-2 control-label">Usia</label>
<div class="col-sm-10">
<input type="integer" name="usia" class="form-control" value="{{ $usia ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
<div class="col-sm-10">
<input type="string" name="jk" class="form-control" value="{{ $jk ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="email" class="col-sm-2 control-label">Email</label>
<div class="col-sm-10">
<input type="string" name="email" class="form-control" value="{{ $email ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="hp" class="col-sm-2 control-label">No Handphone</label>
<div class="col-sm-10">
<input type="integer" name="hp" class="form-control" value="{{ $hp ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="medsos" class="col-sm-2 control-label">Akun Media Sosial</label>
<div class="col-sm-10">
<input type="string" name="medsos" class="form-control" value="{{ $medsos ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="pendidikan_terakhir" class="col-sm-2 control-label">Pendidikan Terakhir</label>
<div class="col-sm-10">
<input type="string" name="pendidikan_terakhir" class="form-control" value="{{ $pendidikan_terakhir ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="nama_instansi" class="col-sm-2 control-label">Nama Instansi</label>
<div class="col-sm-10">
<input type="string" name="nama_instansi" class="form-control" value="{{ $nama_instansi ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="tahun_masuk" class="col-sm-2 control-label">Tahun Masuk</label>
<div class="col-sm-10">
<input type="integer" name="tahun_masuk" class="form-control" value="{{ $tahun_masuk ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="tahun_lulus" class="col-sm-2 control-label">Tahun Lulus</label>
<div class="col-sm-10">
<input type="integer" name="tahun_lulus" class="form-control" value="{{ $tahun_lulus ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="penghargaan" class="col-sm-2 control-label">Penghargaan</label>
<div class="col-sm-10">
<input type="string" name="penghargaan" class="form-control" value="{{ $penghargaan ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="nama_perusahaan" class="col-sm-2 control-label">Nama Perusahaan</label>
<div class="col-sm-10">
<input type="string" name="nama_perusahaan" class="form-control" value="{{ $nama_perusahaan ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="posisi" class="col-sm-2 control-label">Posisi</label>
<div class="col-sm-10">
<input type="string" name="posisi" class="form-control" value="{{ $posisi ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="identitas_atasan" class="col-sm-2 control-label">Nama Atasan</label>
<div class="col-sm-10">
<input type="string" name="identitas_atasan" class="form-control" value="{{ $identitas_atasan ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="gaji_terakhir" class="col-sm-2 control-label">Gaji Terakhir</label>
<div class="col-sm-10">
<input type="string" name="gaji_terakhir" class="form-control" value="{{ $gaji_terakhir ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="jenis_pekerjaan" class="col-sm-2 control-label">Jenis Pekerjaan</label>
<div class="col-sm-10">
<input type="string" name="jenis_pekerjaan" class="form-control" value="{{ $jenis_pekerjaan ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="keahlian_utama" class="col-sm-2 control-label">Keahlian Utama</label>
<div class="col-sm-10">
<input type="string" name="keahlian_utama" class="form-control" value="{{ $keahlian_utama ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="fc_kk" class="col-sm-2 control-label">Fotocopy Kartu Keluarga</label>
<div class="col-sm-10">
<input type="file" name="fc_kk" class="form-control" value="{{ $fc_kk ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="fc_ktp" class="col-sm-2 control-label">Fotocopy KTP</label>
<div class="col-sm-10">
<input type="file" name="fc_ktp" class="form-control" value="{{ $fc_ktp ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="fc_ijazah" class="col-sm-2 control-label">Fotocopy Ijazah Pendidikan Terakhir</label>
<div class="col-sm-10">
<input type="file" name="fc_ijazah" class="form-control" value="{{ $fc_ijazah ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="transkrip_nilai" class="col-sm-2 control-label">Fotocopy Transkrip Nilai</label>
<div class="col-sm-10">
<input type="file" name="transkrip_nilai" class="form-control" value="{{ $transkrip_nilai ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="foto" class="col-sm-2 control-label">Foto</label>
<div class="col-sm-10">
<input type="file" name="foto" class="form-control" value="{{ $foto ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="skck" class="col-sm-2 control-label">SKCK</label>
<div class="col-sm-10">
<input type="file" name="skck" class="form-control" value="{{ $skck ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="surat_keterangan_sehat" class="col-sm-2 control-label">Surat Keterangan Sehat</label>
<div class="col-sm-10">
<input type="file" name="surat_keterangan_sehat" class="form-control" value="{{ $surat_keterangan_sehat ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="sertifikat" class="col-sm-2 control-label">Sertifikat</label>
<div class="col-sm-10">
<input type="file" name="sertifikat" class="form-control" value="{{ $sertifikat ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="surat_keterangan_pengalaman_kerja" class="col-sm-2 control-label">Surat Keterangan Pengalaman Kerja</label>
<div class="col-sm-10">
<input type="file" name="surat_keterangan_pengalaman_kerja" class="form-control" value="{{ $surat_keterangan_pengalaman_kerja ?? '' }}" >
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
<a href="{{ route('data_pelamar.index') }}" class="btn btn-primary" role="button">Batal</a>
</div>
</div>