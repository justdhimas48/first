@extends('layouts.master')

@section('content')

<div class="row">
<div class="col-12">

@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li> @endforeach
</ul>
</div> @endif

<div class="card">
<div class="card-header"> 
    <div class="row justify-content-between">
        <p class="my-auto">Ubah Data</p>
    </div>
</div>
<div class="card-body">
<form class="form-horizontal" action="{{ route('admin.data-pegawai.update', $pegawai->id)}}" method="post" enctype="multipart/form-data"> @method('PUT')
    {{ csrf_field() }}  

    @if (isset($pegawai->sk_pegawai_tetap))
        <div class="form-group">
            <label for="nip" class="col-sm-2 control-label">SK Pegawai Tetap</label>
            <div class="col-sm-10">
                <a href="{{asset($pegawai->sk_pegawai_tetap)}}"><?php echo explode('/', $pegawai->sk_pegawai_tetap)[3] ?></a>
            </div>
        </div>
    @endif
    
    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Unit Kerja</label>
        <div class="col-sm-10">
        <input type="text" name="unit_kerja" class="form-control" value="{{$pegawai->kategori_unit_kerja}}" readonly>
        </div>
    </div>
    
    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Pekerjaan</label>
        <div class="col-sm-10">
        <input type="text" name="jenis_pekerjaan" class="form-control" value="Pegawai" readonly>
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Tanggal SK</label>
        <div class="col-sm-10">
        <input type="text" name="jenis_pekerjaan" class="form-control" value="{{ $pegawai->tanggal_sk ?? '' }}" readonly>
        </div>
    </div>
    
    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">NIP</label>
        <div class="col-sm-10">
        <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Nomor KTP</label>
        <div class="col-sm-10">
        <input type="text" name="no_ktp" class="form-control" value="{{ $pegawai->no_ktp ?? '' }}" >
        </div>
    </div>
    
    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Lama Kontrak (Bulan)</label>
        <div class="col-sm-10">
        <input type="number" name="lama_kontrak" class="form-control" value="{{ $pegawai->lama_kontrak ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nama" class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-10">
        <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama ?? '' }}">
        </div>
    </div>

    <div class="form-group">
        <label for="ttl" class="col-sm-2 control-label">Tempat Lahir</label>
        <div class="col-sm-10">
        <input type="text" name="tempat_lahir" class="form-control" value="{{ $pegawai->tempat_lahir ?? '' }}" >
        </div>
    </div>
    
    <div class="form-group">
        <label for="usia" class="col-sm-2 control-label">Tanggal Lahir</label>
        <div class="col-sm-10">
        <input type="date" name="tanggal_lahir" class="form-control" value="{{ $pegawai->tanggal_lahir ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
        <div class="col-sm-10">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="btn-jenis-kelamin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (isset($pegawai))
                    {{($pegawai->jenis_kelamin == 0) ? "Laki-Laki" : "Perempuan"}}
                @else
                    Jenis Kelamin
                @endif
            </button>
            <div class="dropdown-menu" id="dropdown-jenis-kelamin" aria-labelledby="dropdown-jenis-kelamin">
                <a class="dropdown-item">Laki-Laki</a>
                <a class="dropdown-item">Perempuan</a>
            </div>
            <input type="hidden" name="jenis_kelamin" id="jenis-kelamin" value="
            @if (isset($pegawai->jenis_kelamin))
                {{($pegawai->jenis_kelamin == 0) ? "Laki-Laki" : "Perempuan"}}
            @else
                Jenis Kelamin
            @endif
            "/>
        </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
        <div class="col-sm-10">
        <textarea type="text" name="alamat" class="form-control" rows="3"><?php echo $pegawai->alamat ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Jabatan</label>
        <div class="col-sm-10">
        <input type="text" name="jabatan" class="form-control" value="{{ $pegawai->jabatan ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Agama</label>
        <div class="col-sm-10">
        <input type="text" name="agama" class="form-control" value="{{ $pegawai->agama ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Nomor Handphone</label>
        <div class="col-sm-10">
        <input type="text" name="no_hp" class="form-control" value="{{ $pegawai->no_hp ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Email</label>
        <div class="col-sm-10">
        <input type="text" name="email" class="form-control" value="{{ $pegawai->email ?? '' }}" readonly>
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
        <input type="password" name="password" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label for="email" class="col-sm-4 control-label">Password Confirmation</label>
        <div class="col-sm-10">
        <input type="password" name="password_confirmation" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Pendidikan S1</label>
        <div class="col-sm-10">
        <input type="text" name="pendidikan_s1" class="form-control" value="{{ $pegawai->pendidikan_s1 ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Pendidikan S2</label>
        <div class="col-sm-10">
        <input type="text" name="pendidikan_s2" class="form-control" value="{{ $pegawai->pendidikan_s2 ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Pendidikan S3</label>
        <div class="col-sm-10">
        <input type="text" name="pendidikan_s3" class="form-control" value="{{ $pegawai->pendidikan_s3 ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Nama Suami / Istri</label>
        <div class="col-sm-10">
        <input type="text" name="nama_istri_suami" class="form-control" value="{{ $pegawai->nama_istri_suami ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Nama Anak</label>
        <div class="col-sm-10">
        <input type="text" name="nama_anak" class="form-control" value="{{ $pegawai->nama_anak ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Nama Ayah</label>
        <div class="col-sm-10">
        <input type="text" name="nama_ayah" class="form-control" value="{{ $pegawai->nama_ayah ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Nama Ibu</label>
        <div class="col-sm-10">
        <input type="text" name="nama_ibu" class="form-control" value="{{ $pegawai->nama_ibu ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
    <label for="fc_kk" class="col-sm-4 control-label">Foto BPJS</label>
        <div class="col-sm-10">
        @if (isset($pegawai->foto_bpjs))
            <div class="mb-4">
                <img height="300px" src="{{asset($pegawai->foto_bpjs)}}" alt="">
            </div>
        @endif
        <input type="file" name="foto_bpjs" class="form-control-file">
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Keterangan BPJS</label>
        <div class="col-sm-10">
        <input type="text" name="keterangan_bpjs" class="form-control" value="{{ $pegawai->keterangan_bpjs ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
    <label for="fc_kk" class="col-sm-4 control-label">Foto NPWP</label>
        <div class="col-sm-10">
        @if (isset($pegawai->foto_npwp))
            <div class="mb-4">
                <img height="300px" src="{{asset($pegawai->foto_npwp)}}" alt="">
            </div>
        @endif
        <input type="file" name="foto_npwp" class="form-control-file">
        </div>
    </div>

    <div class="form-group">
    <label for="fc_kk" class="col-sm-4 control-label">Foto Diri</label>
        <div class="col-sm-10">
        @if (isset($pegawai->foto_diri))
            <div class="mb-4">
                <img height="300px" src="{{asset($pegawai->foto_diri)}}" alt="">
            </div>
        @endif
        <input type="file" name="foto_diri" class="form-control-file">
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Pendidikan</label>
        <div class="col-sm-10">
        <input type="text" name="pendidikan" class="form-control" value="{{ $pegawai->pendidikan ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Program Studi (tidak wajib)</label>
        <div class="col-sm-10">
        <input type="text" name="program_studi" class="form-control" value="{{ $pegawai->program_studi ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Tahun Kelulusan</label>
        <div class="col-sm-10">
        <input type="number" name="tahun_kelulusan" class="form-control" value="{{ $pegawai->tahun_kelulusan ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
        <a href="{{ route('admin.data-pegawai.index') }}" class="btn btn-primary" role="button">Batal</a>
        </div>
    </div>
</form>
</div>
</div>

</div>
</div> 
@endsection

@section('contentjs')
    <script src="{{asset('assets/dist/js/pages/jeniskelamin.js')}}"></script>
@endsection