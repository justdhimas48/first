@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">

                        <div class="d-flex justify-content-between">
                            <div>
                                <a class="btn btn-primary btn-md" href="{{ route('data_pelamar.create') }}">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
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
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                            style="table-layout: fixed">
                            <thead>
                                <tr>
                                    <th style="width: 3%">#</th>
                                    <th style="width: 12%">Nama</th>
                                    <th style="width: 15%">Foto</th>
                                    <th style="width: 15%">Tempat, Tanggal Lahir</th>
                                    <th style="width: 10%">Jenis Kelamin</th>
                                    <th style="width: 15%">Email</th>
                                    <th style="width: 10%">No Handphone</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>

                                @forelse($tampil as $item)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            <img height="75px" src="{{ asset($item->foto_diri) }}" alt="">
                                        </td>
                                        <td><?php echo (!isset($item->tempat_lahir) ? '-' : $item->tempat_lahir) . ', ' . (!isset($item->tanggal_lahir) ? '-' : date('d M Y', strtotime($item->tanggal_lahir))); ?></td>
                                        <td>{{ !isset($item->jenis_kelamin) ? '-' : ($item->jenis_kelamin == 0 ? 'Laki-Laki' : 'Perempuan') }}
                                        </td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ !isset($item->no_hp) ? '-' : $item->no_hp }}</td>
                                        <td>{{ $item->nama_status }}</td>

                                        <td>
                                            <div class="d-flex d-inline">

                                                <a class="btn btn-success"
                                                    href="{{ route('data_pelamar.edit', ['data_pelamar' => $item->id]) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a class="btn btn-primary btn-md"
                                                    onclick="printDataPelamar({{ $item->id }})">
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
                        <a href="{{ $tampil->previousPageUrl() }}">
                            <i class="fas fa-fw fa-chevron-left"></i>
                        </a>
                        @for ($i = 1; $i <= $tampil->lastPage(); $i++)
                            <a href="{{ $tampil->url($i) }}">{{ $i }}</a>
                        @endfor
                        <a href="{{ $tampil->nextPageUrl() }}">
                            <i class="fas fa-fw fa-chevron-right"></i>
                        </a>
                    </div>

                </div>

            </div>
    </div> @stop
    @section('plugins.Sweetalert2', true) @section('plugins.Pace', true)

    @section('contentjs')
        @if (session('success'))
            <script type="text/javascript">
                Swal.fire(
                    'Sukses!',
                    '{{ session('success') }}', 'success'
                )
            </script>
        @endif

        <script>
            function printLaporan(filter) {
                var filterWord = "";

                Object.keys(filter).forEach(function(key) {
                    filterWord += key + '=' + filter[key] + '&';
                });

                filterWord = filterWord.substring(0, filterWord.length - 1);
                window.open("{{ route('datapelamar.print') }}?" + filterWord);
            }

            function printDataPelamar(id) {
                window.open("{{ route('datapelamar.print-data-pelamar') }}?" + "id=" + id);
            }
        </script>

        <script type="text/javascript">
            // function hapus(id) {

            //     Swal.fire({
            //         title: 'Konfirmasi',
            //         text: "Yakin menghapus data ini?",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#dd3333',
            //         confirmButtonText: 'Hapus',
            //         cancelButtonText: 'Batal',
            //     }).then((result) => {
            //         if (result.value) {

            //             $.ajax({
            //                     url: "/kelas/" + id,
            //                     type: 'DELETE',
            //                     data: {
            //                         '_token': $('meta[name=csrf-token]').attr("content"),
            //                     },
            //                     success: function(result) {
            //                         Swal.fire(
            //                             'Sukses!', 'Berhasil Hapus', 'success'



            //                         }
            //                     });

            //             );
            //             location.reload();


            //         }
            //     })
            // }
        </script>
    </div>
@endsection
