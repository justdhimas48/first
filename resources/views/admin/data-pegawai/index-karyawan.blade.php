@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="d-inline">
                                Data Pegawai
                                <a class="btn btn-success btn-md"
                                    onclick="printLaporan({{ json_encode(['search' => app('request')->input('search') == null ? '' : app('request')->input('search')]) }})">
                                    <i class="fa fa-print"></i> Print
                                </a>
                            </div>
                            <div>
                                <form action="" id="formSearch">
                                    <div class="form-group row my-auto">
                                        <input type="text" class="form-control col-10" name="search" placeholder="Pencarian"
                                            value="{{ request()->get('search') ?? '' }}">
                                        <button type="submit" class="btn btn-icon btn-primary col-2">
                                            <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                            >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>Jurusan / Bidang</th>
                                    <th>Status</th>
                                    <th>Lama Bekerja</th>
                                    <th>Pendidikan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>

                                @forelse($pegawai as $item)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td class="text-center">
                                            <img height="125px" src="{{ asset($item->foto_diri) }}" alt="">
                                        </td>
                                        <td>{{ $item->jenis_kelamin == 0 ? 'Laki-Laki' : 'Perempuan' }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>{{ $item->status == 0 ? 'Tidak Bekerja' : 'Sedang Bekerja' }}</td>
                                        <td>{{ $item->lama_bekerja }} bulan</td>

                                        <td>
                                            Pendidikan S1 : {{ $item->pendidikan_s1 ?? '-' }} <br>
                                            Pendidikan S2 : {{ $item->pendidikan_s2 ?? '-' }} <br>
                                            Pendidikan S3 : {{ $item->pendidikan_s3 ?? '-' }}
                                        </td>
                                        <td>
                                            <div class="d-flex d-inline">
                                                <a class="btn btn-success"
                                                    href="{{ route('admin.data-pegawai.edit', $item->id) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a class="btn btn-primary btn-md"
                                                    onclick="printDataKaryawan({{ $item->id }})">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>

                                @empty
                                    <tr>
                                        <td colspan="4"> Tidak ada data.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        <a href="{{ $pegawai->previousPageUrl() }}">
                            <i class="fas fa-fw fa-chevron-left"></i>
                        </a>
                        @for ($i = 1; $i <= $pegawai->lastPage(); $i++)
                            <a href="{{ $pegawai->url($i) }}">{{ $i }}</a>
                        @endfor
                        <a href="{{ $pegawai->nextPageUrl() }}">
                            <i class="fas fa-fw fa-chevron-right"></i>
                        </a>
                    </div>

                </div>

            </div>
    </div> @stop

    @section('contentjs')
        <script>
            function printLaporan(filter) {
                var filterWord = "";

                Object.keys(filter).forEach(function(key) {
                    filterWord += key + '=' + filter[key] + '&';
                });

                filterWord = filterWord.substring(0, filterWord.length - 1);
                window.open("{{ route('admin.data-karyawan.print') }}?" + filterWord);
            }

            function printDataKaryawan(id) {
                window.open("{{ route('admin.data-karyawan.print-data-karyawan') }}?" + "id=" + id);
            }
        </script>
    @endsection
