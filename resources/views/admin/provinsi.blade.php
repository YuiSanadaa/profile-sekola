@extends('layouts.admin')

@section('content')
<div class="block-header">
  <h2>Provinsi</h2>
</div>
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ Session::get('message') }}
</div>
@endif
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>
          Data Provinsi
        </h2>
        <ul class="header-dropdown m-r--5">
          <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">more_vert</i>
            </a>
            <ul class="dropdown-menu pull-right">
              <li><a data-toggle="modal" data-target="#addModal">Tambah</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="body">
        <div class="table-responsive">          
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Provinsi</th>
                <th>Option</th>
              </tr>
            </thead>            
            <tbody>
              @foreach($provinsi as $pinsi)
              <tr>
                <td>{{ $pinsi->id }}</td>
                <td>{{ $pinsi->kode }}</td>
                <td>{{ $pinsi->provinsi }}</td>                
                <td class="text-center">
                  <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $pinsi->id }}editModal">
                    <i class="material-icons">edit</i>                    
                  </button>
                  <button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $pinsi->id }}deleteModal">
                    <i class="material-icons">delete</i>                    
                  </button>                  
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Tambah Provinsi</h4>
      </div>
      <form method="post" action="{{ route('addProvinsi') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="form-label">Kode</label>
                <div class="form-line">
                  <input type="number" class="form-control" name="kode" required autofocus />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Provinsi</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="provinsi" required />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success waves-effect">Simpan</button>
          <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Keluar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach($provinsi as $pinsi)
<div class="modal fade" id="{{ $pinsi->id }}editModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Edit Provinsi</h4>
      </div>
      <form method="post" action="{{ route('editProvinsi') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $pinsi->id }}">
              <div class="form-group">
                <label class="form-label">Kode</label>
                <div class="form-line">
                <input type="number" class="form-control" name="kode" value="{{ $pinsi->kode }}" required autofocus />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Provinsi</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="provinsi" value="{{ $pinsi->desa }}" required />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success waves-effect">Simpan</button>
          <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Keluar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

@foreach($provinsi as $pinsi)
<div class="modal fade" id="{{ $pinsi->id }}deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="smallModalLabel">Hapus Desa</h4>
      </div>
      <div class="modal-body">
        Yakin ingin menghapus Provinsi {{ $pinsi->provinsi }}?
      </div>
      <form method="post" action="{{ route('deleteProvinsi') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $pinsi->id }}">
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger waves-effect">Hapus</button>
          <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">Keluar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection
