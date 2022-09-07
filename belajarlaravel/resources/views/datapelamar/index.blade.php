@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
        <div class="card-header">
        <a class="btn btn-primary btn-md" href="{{ route('data_pelamar.create') }}">
        <i class="fa fa-plus"></i> Tambah
        </a>
        </div>
        
        <div class="card-body">
        <table class="table table-bordered">
        <thead>
        <tr>
        <th style="width: 20px">#</th>
        <th>Nama</th>
        <th>Tempat Tanggal Lahir</th>
        <th>Usia</th>
        <th>Jenis Kelamin</th>
        <th>Email</th>
        <th>No Handphone</th>
        <th>Akun Media Sosial</th>
        <th>Pendidikan Terakhir</th>
        <th>Nama Instansi</th>
        <th>Tahun Masuk</th>
        <th>Tahun Lulus</th>
        <th>Penghargaan</th>
        <th>Nama Perusahaan</th>
        <th>Posisi</th>
        <th>Identitas Atasan</th>
        <th>Gaji Terakhir</th>
        <th>Jenis Pekerjaan</th>
        <th>Keahlian Utama</th>
        <th>Fotocopy Kartu Keluarga</th>
        <th>Fotocopy KTP</th>
        <th>Fotocopy Ijazah</th>
        <th>Transkrip Nilai</th>
        <th>Foto</th>
        <th>SKCK</th>
        <th>Surat Keterangan Sehat</th>
        <th>Sertifikat</th>
        <th>Surat Keterangan Pengalaman Kerja</th>
        <th style="width: 10%">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1;?>
        
        @forelse($tampil as $item)
        <tr>
        <td>
        {{ $no }}
        </td>
        <td>
            {{ $item->pi }}
            </td>
            <td>
            {{ $item->nama }}
            </td>
            <td>
            {{ $item->ttl }}
            </td>
            <td>
            {{ $item->usia }}
            </td>
            <td>
            {{ $item->jk }}
            </td>
            <td>
                        {{ $item->email }}
                        </td>
                        <td>
                            {{ $item->hp }}
                            </td>
                            <td>
                                {{ $item->medsos }}
                                </td>
                                <td>
                                    {{ $item->pendidikan_terakhir }}
                                    </td>
                                    <td>
                                        {{ $item->nama_instansi }}
                                        </td>
                                        <td>
                                            {{ $item->tahun_masuk }}
                                            </td>
                                            <td>
                                                {{ $item->tahun_lulus }}
                                                </td>
                                                <td>
                                                    {{ $item->penghargaan }}
                                                    </td>
                                                    <td>
                                                        {{ $item->nama_perusahaan }}
                                                        </td>
                                                        <td>
                                                            {{ $item->posisi }}
                                                            </td>
                                                            <td>
                                                                {{ $item->identitas_atasan }}
                                                                </td>
                                                                <td>
                                                                    {{ $item->gaji_terakhir }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $item->jenis_pekerjaan }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $item->keahlian_utama }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $item->fc_kk }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $item->fc_ktp }}
                                                                                    </td>
                                                                                    <td>
                                                                                        {{ $item->fc_ijazah }}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{ $item->transkrip_nilai }}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{ $item->foto }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{ $item->skck }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ $item->surat_keterangan_sehat }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {{ $item->sertifikat }}
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                {{ $item->surat_keterangan_pengalaman_kerja }}
                                                                                                                </td>
        <td>
        <div class="btn-group">
        <a class="btn btn-success" href="{{ route('data_pelamar.edit', ['data_pelamar' => $item->id]) }}">
        <i class="fas fa-pencil-alt"></i>
        </a>
        <a class="btn btn-primary" onclick="hapus('{{ $item->id }}')" href="#">
        <i class="fas fa-trash"></i>
        </a>
        </div>
        
        </td>
        </tr>
        <?php $no++;?>
        
        @empty
        <tr>
        <td colspan="4"> Tidak ada data.
        </td>
        </tr> @endforelse
        </tbody>
        </table>
        
        </div>
        
        <div class="card-footer clearfix text-center">
            <div class="mt-2">
                {{ $tampil->links() }}
            </div>
        </div>
        
        </div>
        
        </div>
        </div> @stop
        @section('plugins.Sweetalert2', true) @section('plugins.Pace', true)
        
        @section('js')
        @if (session('success'))
        <script type="text/javascript"> Swal.fire(
        'Sukses!',
        '{{ session('success') }}', 'success'
        )
        </script> @endif
         
        <script type="text/javascript"> function hapus(id){
        
            Swal.fire({
            title: 'Konfirmasi',
            text: "Yakin menghapus data ini?", icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#dd3333', confirmButtonText: 'Hapus', cancelButtonText: 'Batal',
            }).then((result) => { if (result.value) {
            
            $.ajax({
            url: "/kelas/"+id, type: 'DELETE',
            data: {
            '_token': $('meta[name=csrf-token]').attr("content"),
            },
            success: function(result) { Swal.fire(
            'Sukses!', 'Berhasil Hapus', 'success'
             
            
            
            }
            });
             
            );
            location.reload();
             
            
            }
            })
            }
            </script>
</div>
@endsection