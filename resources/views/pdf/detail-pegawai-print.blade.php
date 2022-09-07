<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .col-xs-1,
        .col-sm-1,
        .col-md-1,
        .col-lg-1,
        .col-xs-2,
        .col-sm-2,
        .col-md-2,
        .col-lg-2,
        .col-xs-3,
        .col-sm-3,
        .col-md-3,
        .col-lg-3,
        .col-xs-4,
        .col-sm-4,
        .col-md-4,
        .col-lg-4,
        .col-xs-5,
        .col-sm-5,
        .col-md-5,
        .col-lg-5,
        .col-xs-6,
        .col-sm-6,
        .col-md-6,
        .col-lg-6,
        .col-xs-7,
        .col-sm-7,
        .col-md-7,
        .col-lg-7,
        .col-xs-8,
        .col-sm-8,
        .col-md-8,
        .col-lg-8,
        .col-xs-9,
        .col-sm-9,
        .col-md-9,
        .col-lg-9,
        .col-xs-10,
        .col-sm-10,
        .col-md-10,
        .col-lg-10,
        .col-xs-11,
        .col-sm-11,
        .col-md-11,
        .col-lg-11,
        .col-xs-12,
        .col-sm-12,
        .col-md-12,
        .col-lg-12 {
            border: 0;
            padding: 0;
            margin-left: -0.00001;
        }

    </style>
</head>

<body class="m-4">
    <div>
        <div class="text-center">
            <h3>Data Pegawai</h3>
        </div>
        <form class="form-horizontal" action="{{ route('admin.data-pegawai.update', $pegawai->id) }}" method="post"
            enctype="multipart/form-data"> @method('PUT')
            {{ csrf_field() }}

            @if (isset($pegawai->sk_pegawai_tetap))
                <div class="form-group">
                    <label for="nip" class="col-sm-2 control-label">SK Pegawai Tetap</label>
                    <div class="col-sm-10">
                        <a href="{{ asset($pegawai->sk_pegawai_tetap) }}"><?php echo explode('/', $pegawai->sk_pegawai_tetap)[3]; ?></a>
                    </div>
                </div>
            @endif

            <div class="form-group">
                <label for="nip" class="col-sm-2 control-label">Unit Kerja</label>
                <div class="col-sm-10">
                    <input type="text" name="unit_kerja" class="form-control"
                        value="{{ $pegawai->kategori_unit_kerja }}" readonly>
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
                    <input type="text" name="jenis_pekerjaan" class="form-control"
                        value="{{ $pegawai->tanggal_sk ?? '' }}" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-2 control-label">NIP</label>
                <div class="col-sm-10">
                    <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-2 control-label">Nomor KTP</label>
                <div class="col-sm-10">
                    <input type="text" name="no_ktp" class="form-control" value="{{ $pegawai->no_ktp ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Lama Kontrak (Bulan)</label>
                <div class="col-sm-10">
                    <input type="number" name="lama_kontrak" class="form-control"
                        value="{{ $pegawai->lama_kontrak ?? '' }}">
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
                    <input type="text" name="tempat_lahir" class="form-control"
                        value="{{ $pegawai->tempat_lahir ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="usia" class="col-sm-2 control-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal_lahir" class="form-control"
                        value="{{ $pegawai->tanggal_lahir ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    {{ $pegawai->jenis_kelamin == 0 ? 'Laki-Laki' : 'Perempuan' }}
                </div>
            </div>

            <div class="form-group">
                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea type="text" name="alamat" class="form-control" rows="3"><?php echo $pegawai->alamat; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-10">
                    <input type="text" name="jabatan" class="form-control" value="{{ $pegawai->jabatan ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-2 control-label">Agama</label>
                <div class="col-sm-10">
                    <input type="text" name="agama" class="form-control" value="{{ $pegawai->agama ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Nomor Handphone</label>
                <div class="col-sm-10">
                    <input type="text" name="no_hp" class="form-control" value="{{ $pegawai->no_hp ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" value="{{ $pegawai->email ?? '' }}"
                        readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Pendidikan S1</label>
                <div class="col-sm-10">
                    <input type="text" name="pendidikan_s1" class="form-control"
                        value="{{ $pegawai->pendidikan_s1 ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Pendidikan S2</label>
                <div class="col-sm-10">
                    <input type="text" name="pendidikan_s2" class="form-control"
                        value="{{ $pegawai->pendidikan_s2 ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Pendidikan S3</label>
                <div class="col-sm-10">
                    <input type="text" name="pendidikan_s3" class="form-control"
                        value="{{ $pegawai->pendidikan_s3 ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Nama Suami / Istri</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_istri_suami" class="form-control"
                        value="{{ $pegawai->nama_istri_suami ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Nama Anak</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_anak" class="form-control"
                        value="{{ $pegawai->nama_anak ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Nama Ayah</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_ayah" class="form-control"
                        value="{{ $pegawai->nama_ayah ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Nama Ibu</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_ibu" class="form-control" value="{{ $pegawai->nama_ibu ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="fc_kk" class="col-sm-4 control-label">Foto BPJS</label>
                <div class="col-sm-10">
                    @if (isset($pegawai->foto_bpjs))
                        <div class="mb-4">
                            <img height="300px" src="{{ asset($pegawai->foto_bpjs) }}" alt="">
                        </div>
                    @endif
                    <input type="file" name="foto_bpjs" class="form-control-file">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Keterangan BPJS</label>
                <div class="col-sm-10">
                    <input type="text" name="keterangan_bpjs" class="form-control"
                        value="{{ $pegawai->keterangan_bpjs ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="fc_kk" class="col-sm-4 control-label">Foto NPWP</label>
                <div class="col-sm-10">
                    @if (isset($pegawai->foto_npwp))
                        <div class="mb-4">
                            <img height="300px" src="{{ asset($pegawai->foto_npwp) }}" alt="">
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
                            <img height="300px" src="{{ asset($pegawai->foto_diri) }}" alt="">
                        </div>
                    @endif
                    <input type="file" name="foto_diri" class="form-control-file">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-2 control-label">Pendidikan</label>
                <div class="col-sm-10">
                    <input type="text" name="pendidikan" class="form-control"
                        value="{{ $pegawai->pendidikan ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-6 control-label">Program Studi (tidak wajib)</label>
                <div class="col-sm-10">
                    <input type="text" name="program_studi" class="form-control"
                        value="{{ $pegawai->program_studi ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nip" class="col-sm-2 control-label">Tahun Kelulusan</label>
                <div class="col-sm-10">
                    <input type="number" name="tahun_kelulusan" class="form-control"
                        value="{{ $pegawai->tahun_kelulusan ?? '' }}">
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script>
        window.print();
        setTimeout(function() {
            window.close();
        }, 500);
    </script>
</body>

</html>
