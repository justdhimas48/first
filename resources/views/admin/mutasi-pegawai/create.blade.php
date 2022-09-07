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
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="card">
                <div class="card-header"> Mutasi Pegawai
                </div>

                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.mutasi-pegawai.store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama" class="col-sm-2 control-label">Pegawai</label>
                            <div class="col-sm-10">
                                <div class="dropdown">
                                    @if (isset($pegawai))
                                        <button class="btn btn-light dropdown-toggle" type="button" id="btn-pegawai"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pilih Pegawai
                                        </button>
                                        <input type="hidden" id="pegawai" name="pegawai">
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                            id="dropdown-pegawai">
                                            @foreach ($pegawai as $v)
                                                <a class="dropdown-item" href="#"
                                                    id="{{ $v->id }}"><?php echo $v->id . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $v->nama . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $v->nama_kategori_unit_kerja; ?></a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group mx-2">
                <label for="">Mutasi Pekerjaan dan Jabatan</label>
                <div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="cb-pekerjaan" name="cb_pekerjaan">
                        <label class="form-check-label" for="exampleCheck1">Mutasi Pekerjaan Pegawai ke Unit Kerja</label>
                    </div>
        
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="cb-jabatan" name="cb_jabatan">
                            <label class="form-check-label" for="exampleCheck1">Mutasi Jabatan Pegawai</label>
                        </div>
                        <div class="col-sm-10 pl-0 my-2">
                        <input type="text" name="jabatan_tujuan" class="form-control" id="jabatan-tujuan" disabled>
                        </div>
                    </div>
                </div>
            </div> --}}


                        <div class="form-group">
                            <label for="jk" class="col-sm-2 control-label">Kategori Unit Kerja</label>
                            <div class="col-sm-10">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="btn-kategori-unit-kerja"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Kategori Unit Kerja
                                    </button>
                                    <div class="dropdown-menu" id="dropdown-kategori-unit-kerja">
                                        @foreach ($kategoriUnitKerja as $v)
                                            <a class="dropdown-item" data-id="{{ $v->id }}">{{ $v->nama }}</a>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="kategori_unit_kerja" id="kategori-unit-kerja" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ttl" class="col-sm-2 control-label">Deskripsi Mutasi</label>
                            <div class="col-sm-10">
                                <textarea class="editor form-control" name="editor" id="editor">

                        </textarea>
                            </div>
                        </div>
                        <!-- update -->
                        <div class="form-group">
                            <label for="fc_ktp" class="col-sm-2 control-label">Lampiran</label>
                            <div class="col-sm-10">
                                <input type="file" name="lampiran" class="form-control-file">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
                                <a href="{{ route('admin.mutasi-pegawai.index') }}" class="btn btn-primary"
                                    role="button">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('contentjs')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor');
    </script>
    <script src="{{ asset('assets/dist/js/pages/admin/jadwal-tes.js') }}"></script>
    <script>
        $('#dropdown-kategori-unit-kerja a').on("click", function() {
            var id = $(this).attr('data-id');
            $('#btn-kategori-unit-kerja').html($(this).html());
            $('#kategori-unit-kerja').val(id);
        });
    </script>
@endsection
