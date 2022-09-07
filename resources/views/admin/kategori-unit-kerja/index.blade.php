@extends('layouts.master')

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
        <li>{{ $error }}</li> @endforeach
        </ul>
        </div> @endif
        
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 10%">#</th>
                        <th style="width: 10%">No</th>
                        <th style="width: 25%">Nama</th>
                        <th style="width: 25%">Aktif</th>
                        <th style="width: 30%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($kategoriUnitKerja as $item)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" data-id="{{$item->id}}" id="checkActive" {{($item->is_actived == 1) ? 'checked' : ''}}>
                            </div>
                        </td>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama }}</td>
                        <td><?php echo (($item->is_actived == 1) ? 'Aktif' : 'Tidak Aktif') ?></td>
                        
                        <td>
                            <a class="btn btn-success" id="editCategoryModalButton" data-id="{{$item->id}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
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
        
        <div class="text-center">
            <a href="{{$kategoriUnitKerja->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$kategoriUnitKerja->lastPage();$i++)
                <a href="{{$kategoriUnitKerja->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$kategoriUnitKerja->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
    </div>
    
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Kategori Unit Kerja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="{{route('admin.kategori-unit-kerja.store')}}" method="post"> 
            <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-12">
                        <input type="text" name="nama" class="form-control" value="">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalTitle">Kategori Unit Kerja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="{{route('admin.kategori-unit-kerja.update')}}" method="post"> 
        <div class="modal-body">
                {{ csrf_field() }}
                <input type="hidden" id="editCategoryId" name="id">
                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-12">
                    <input type="text" name="nama" class="form-control" value="" id="nama">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div> @stop
@section('contentjs')
<script>
    $(document).on("click", "#checkActive", function(){
        var id = $(this).attr('data-id');
        $.get('kategori_unit_kerja/active/' + id, function(data){
            if(data == 1){
                location.reload();
            }
        })
    })

    $(document).on("click", "#editCategoryModalButton", function(){
        var id = $(this).attr('data-id');
        $.get('kategori_unit_kerja/edit/' + id, function(data){
            $('#editCategoryId').val(data.id);
            $('#nama').val(data.nama);
            $('#editModalTitle').html("Ubah Kategori " + data.nama);

            $('#editCategoryModal').modal('show');
        })
    })
</script>

@stop
        