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
        <div class="text-center"><h3>Data Pelamar</h3></div>
        <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">*Nama</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" value="{{ $datapelamar->nama ?? '' }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="ttl" class="col-sm-2 control-label">Tempat Lahir</label>
            <div class="col-sm-10">
                <input type="text" name="tempat_lahir" class="form-control" value="{{ $datapelamar->tempat_lahir ?? '' }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="usia" class="col-sm-2 control-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $datapelamar->tanggal_lahir ?? '' }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                {{ $datapelamar->jenis_kelamin == 0 ? 'Laki-Laki' : 'Perempuan' }}
            </div>
        </div>
        
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">*Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" value="{{ $datapelamar->email ?? '' }}"
                    @if (isset($email)) readonly @endif>
            </div>
        </div>
        
        <div class="form-group">
            <label for="hp" class="col-sm-2 control-label">No Handphone</label>
            <div class="col-sm-10">
                <input type="string" name="no_hp" class="form-control" value="{{ $datapelamar->no_hp ?? '' }}">
            </div>
        </div>

        <div class="form-group">
            <label for="hp" class="col-sm-2 control-label">NIDN</label>
            <div class="col-sm-10">
                <input type="string" name="nidn" class="form-control" value="{{ $datapelamar->nidn ?? '' }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="hp" class="col-sm-2 control-label">Pendidikan S1</label>
            <div class="col-sm-10">
                <input type="string" name="pendidikan_s1" class="form-control" value="{{ $datapelamar->pendidikan_s1 ?? '' }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="hp" class="col-sm-2 control-label">Pendidikan S2</label>
            <div class="col-sm-10">
                <input type="string" name="pendidikan_s2" class="form-control" value="{{ $datapelamar->pendidikan_s2 ?? '' }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="hp" class="col-sm-2 control-label">Pendidikan S3</label>
            <div class="col-sm-10">
                <input type="string" name="pendidikan_s3" class="form-control" value="{{ $datapelamar->pendidikan_s3 ?? '' }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="hp" class="col-sm-2 control-label">Pekerjaan Tujuan</label> <br>
            {{$datapelamar->pekerjaan_tujuan}}
        </div>
        
        <div class="form-group">
            <label for="hp" class="col-sm-2 control-label">Jurusan / Bidang</label>
            <div class="col-sm-10">
                <input type="string" name="jurusan_bidang" class="form-control" value="{{ $datapelamar->jurusan_bidang ?? '' }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="fc_kk" class="col-sm-4 control-label">Kompetensi Khusus (wajib jika dosen)</label>
            <div class="col-sm-10">
                <img height="300px" src="{{ asset($datapelamar->kompetensi_khusus) }}" alt="">
            </div>
        </div>
        
        <div class="form-group">
            <label for="hp" class="col-sm-4 control-label">Keterangan Kompetensi Khusus</label>
            <div class="col-sm-10">
                <input type="string" name="keterangan_kompetensi_khusus" class="form-control"
                    value="{{ $datapelamar->deskripsi_kompetensi_khusus ?? '' }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="fc_kk" class="col-sm-4 control-label">Fotocopy Kartu Keluarga</label>
            <div class="col-sm-10">
                <img height="300px" src="{{ asset($datapelamar->foto_kk) }}" alt="">
            </div>
        </div>
        
        <div class="form-group">
            <label for="fc_ktp" class="col-sm-2 control-label">Fotocopy KTP</label>
            <div class="col-sm-10">
                <img height="300px" src="{{ asset($datapelamar->foto_ktp) }}" alt="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Fotocopy Ijazah</label>
            <div class="col-sm-10">
                <img height="300px" src="{{ asset($datapelamar->foto_ijazah) }}" alt="">
            </div>
        </div>
        
        <div class="form-group">
            <label for="transkrip_nilai" class="col-sm-2 control-label">Foto Diri</label>
            <div class="col-sm-10">
                <img height="300px" src="{{ asset($datapelamar->foto_diri) }}" alt="">
            </div>
        </div>
        
        <div class="form-group">
            <label for="skck" class="col-sm-2 control-label">Foto SKCK</label>
            <div class="col-sm-10">
                <img height="300px" src="{{ asset($datapelamar->foto_skck) }}" alt="">
            </div>
        </div>
        
        <div class="form-group">
            <label for="surat_keterangan_sehat" class="col-sm-4 control-label">Surat Keterangan Sehat</label>
            <div class="col-sm-10">
                <img height="300px" src="{{ asset($datapelamar->surat_keterangan_sehat) }}" alt="">
            </div>
        </div>
        
        <div class="form-group">
            <label for="surat_keterangan_pengalaman_kerja" class="col-sm-4 control-label">Surat Pengalaman Kerja</label>
            <div class="col-sm-10">
                <img height="300px" src="{{ asset($datapelamar->surat_pengalaman_kerja) }}" alt="">
            </div>
        </div>        
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
    </script>
</body>

</html>
