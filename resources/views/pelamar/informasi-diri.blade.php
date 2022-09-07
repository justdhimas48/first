@extends('layouts_pelamar.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4 class="my-auto">Data Pribadi</h4>
                        </a>
                    </div>

                    <div class="card-body">
                        {{-- <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama</b></p>
                <p class="col-xl-9 my-auto">{{$datapelamar->nama}}</p>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Foto Diri</b></p>
                <div class="col-xl-9 my-auto">
                    <img height="150px" src="{{asset($datapelamar->foto_diri)}}" alt="">    
                </div>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Tempat, Tanggal Lahir</b></p>
                <p class="col-xl-9 my-auto"><?php echo $datapelamar->tempat_lahir . ', ' . date('d M Y', strtotime($datapelamar->tanggal_lahir)); ?></p>                  
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jenis Kelamin</b></p>
                <p class="col-xl-9 my-auto">{{ ($datapelamar->jenis_kelamin == 0) ? 'Laki-Laki' : 'Perempuan' }}</p>                  
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Email</b></p>
                <p class="col-xl-9 my-auto">{{$datapelamar->email}}</p>                  
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nomor Handphone</b></p>
                <p class="col-xl-9 my-auto">{{$datapelamar->no_hp}}</p>                  
            </div> --}}
                        <form class="form-horizontal" action="{{ route('pelamar.informasi-diri.store') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" class="form-control" value="{{ $datapelamar->id ?? '' }}">

                            <div class="form-group">
                                <label for="nama" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control"
                                        value="{{ $datapelamar->nama ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ttl" class="col-sm-2 control-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tempat_lahir" class="form-control"
                                        value="{{ $datapelamar->tempat_lahir ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="usia" class="col-sm-2 control-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal_lahir" class="form-control"
                                        value="{{ $datapelamar->tanggal_lahir ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="btn-jenis-kelamin"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if (isset($datapelamar->jenis_kelamin))
                                                {{ $datapelamar->jenis_kelamin == 0 ? 'Laki-Laki' : 'Perempuan' }}
                                            @else
                                                Jenis Kelamin
                                            @endif
                                        </button>
                                        <div class="dropdown-menu" id="dropdown-jenis-kelamin"
                                            aria-labelledby="dropdown-jenis-kelamin">
                                            <a class="dropdown-item">Laki-Laki</a>
                                            <a class="dropdown-item">Perempuan</a>
                                        </div>
                                        <input type="hidden" name="jenis_kelamin" id="jenis-kelamin" value="
                    @if (isset($datapelamar->jenis_kelamin)) {{ $datapelamar->jenis_kelamin == 0 ? 'Laki-Laki' : 'Perempuan' }}
    @else
        Jenis Kelamin @endif
                    " />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="hp" class="col-sm-2 control-label">No Handphone</label>
                                <div class="col-sm-10">
                                    <input type="string" name="no_hp" class="form-control"
                                        value="{{ $datapelamar->no_hp ?? '' }}">
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
                                    <input type="string" name="pendidikan_s1" class="form-control"
                                        value="{{ $datapelamar->pendidikan_s1 ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="hp" class="col-sm-2 control-label">Pendidikan S2</label>
                                <div class="col-sm-10">
                                    <input type="string" name="pendidikan_s2" class="form-control"
                                        value="{{ $datapelamar->pendidikan_s2 ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="hp" class="col-sm-2 control-label">Pendidikan S3</label>
                                <div class="col-sm-10">
                                    <input type="string" name="pendidikan_s3" class="form-control"
                                        value="{{ $datapelamar->pendidikan_s3 ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="hp" class="col-sm-2 control-label">Pekerjaan Tujuan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="pekerjaan_tujuan">
                                        <option value="karyawan"
                                            {{ $datapelamar->pekerjaan_tujuan == 'karyawan' ? 'selected' : '' }}>
                                            Karyawan</option>
                                        <option value="dosen"
                                            {{ $datapelamar->pekerjaan_tujuan == 'dosen' ? 'selected' : '' }}>Dosen
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="hp" class="col-sm-2 control-label">Jurusan / Bidang</label>
                                <div class="col-sm-10">
                                    <input type="string" name="jurusan_bidang" class="form-control"
                                        value="{{ $datapelamar->jurusan_bidang ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fc_kk" class="col-sm-4 control-label">Kompetensi Khusus (wajib jika
                                    dosen)</label>
                                <div class="col-sm-10">
                                    @if (isset($datapelamar->kompetensi_khusus))
                                        <div class="mb-4">
                                            <img height="300px" src="{{ asset($datapelamar->kompetensi_khusus) }}"
                                                alt="">
                                        </div>
                                    @endif
                                    <input type="file" name="kompetensi_khusus" class="form-control-file">
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
                                    @if (isset($datapelamar->foto_kk))
                                        <div class="mb-4">
                                            <img height="300px" src="{{ asset($datapelamar->foto_kk) }}" alt="">
                                        </div>
                                    @endif
                                    <input type="file" name="foto_kk" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fc_ktp" class="col-sm-2 control-label">Fotocopy KTP</label>
                                <div class="col-sm-10">
                                    @if (isset($datapelamar->foto_ktp))
                                        <div class="mb-4">
                                            <img height="300px" src="{{ asset($datapelamar->foto_ktp) }}" alt="">
                                        </div>
                                    @endif
                                    <input type="file" name="foto_ktp" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fc_ijazah" class="col-sm-2 control-label">Fotocopy Ijazah</label>
                                <div class="col-sm-10">
                                    @if (isset($datapelamar->foto_ijazah))
                                        <div class="mb-4">
                                            <img height="300px" src="{{ asset($datapelamar->foto_ijazah) }}" alt="">
                                        </div>
                                    @endif
                                    <input type="file" name="foto_ijazah" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="transkrip_nilai" class="col-sm-2 control-label">Foto Diri</label>
                                <div class="col-sm-10">
                                    @if (isset($datapelamar->foto_diri))
                                        <div class="mb-4">
                                            <img height="300px" src="{{ asset($datapelamar->foto_diri) }}" alt="">
                                        </div>
                                    @endif
                                    <input type="file" name="foto_diri" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="skck" class="col-sm-2 control-label">Foto SKCK</label>
                                <div class="col-sm-10">
                                    @if (isset($datapelamar->foto_skck))
                                        <div class="mb-4">
                                            <img height="300px" src="{{ asset($datapelamar->foto_skck) }}" alt="">
                                        </div>
                                    @endif
                                    <input type="file" name="foto_skck" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="surat_keterangan_sehat" class="col-sm-4 control-label">Surat Keterangan
                                    Sehat</label>
                                <div class="col-sm-10">
                                    @if (isset($datapelamar->surat_keterangan_sehat))
                                        <div class="mb-4">
                                            <img height="300px" src="{{ asset($datapelamar->surat_keterangan_sehat) }}"
                                                alt="">
                                        </div>
                                    @endif
                                    <input type="file" name="surat_keterangan_sehat" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="surat_keterangan_pengalaman_kerja" class="col-sm-4 control-label">Surat
                                    Pengalaman Kerja</label>
                                <div class="col-sm-10">
                                    @if (isset($datapelamar->surat_pengalaman_kerja))
                                        <div class="mb-4">
                                            <img height="300px" src="{{ asset($datapelamar->surat_pengalaman_kerja) }}"
                                                alt="">
                                        </div>
                                    @endif
                                    <input type="file" name="surat_pengalaman_kerja" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
    </div> @stop

    @section('contentjs')
        <script src="{{ asset('assets/dist/js/pages/jeniskelamin.js') }}"></script>
    @endsection
