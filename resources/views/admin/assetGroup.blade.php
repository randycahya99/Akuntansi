@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Jenis Harta</h2>
                </div>
                <div class="card-body">
                    
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-stripped data">
                        <thead style="text-align: center">
                            <th style="text-align: center">#</th>
                            <th>Jenis Harta</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($assetGroup as $indexKey => $groups)
                                <tr>
                                    <td style="text-align: center">{{ $indexKey+1 }}</td>
                                    <td>{{ $groups->asset_group_name }}</td>
                                    <td>{{ $groups->description }}</td>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-info btn-sm" title="Preview" data-toggle="modal" data-target="#showData{{$groups['id']}}" style="margin-left: -20px">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$groups['id']}}">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#deleteData{{$groups['id']}}" style="margin-right: -20px">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData">
                        + Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="/admin/addAssetGroup" method="POST">
                @csrf
                <div class="form-group">
                    <label>Jenis Harta</label>
                    <select class="form-control" name="asset_group_name" id="asset_group_name">
                        <option value="" selected>Pilih Jenis Harta</option>
                        
                        @foreach($account as $akun)
                        
                        <option value="{{ $akun->account_type_name }}">{{ $akun->account_type_name }}</option>

                        @endforeach

                    </select>

                    @if ($errors->has('asset_group_name'))
                    <span><p style="color: red">{{ $errors->first('asset_group_name') }}</p></span>
                    @endif

                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Masukkan Deskripsi">
                    
                    @if ($errors->has('description'))
                    <span><p style="color: red">{{ $errors->first('description') }}</p></span>
                    @endif

                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
            </form>
    </div>
</div>
</div>


<!-- Modal Lihat Data -->
@foreach($assetGroup as $groups)
<div class="modal fade" id="showData{{$groups['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Jenis Harta</label>
                        <input type="text" class="form-control" name="asset_group_name" id="asset_group_name" value="{{$groups['asset_group_name']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$groups['description']}}" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
                </form>
        </div>
    </div>
</div>
@endforeach


<!-- Modal Edit Data -->
@foreach($assetGroup as $groups)
<div class="modal fade" id="editData{{$groups['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/admin/{{$groups->id}}/updateAssetGroup" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Jenis Harta</label>
                        <select class="form-control" name="asset_group_name" id="asset_group_name">
                            <option value="{{$groups['asset_group_name']}}" selected>{{$groups['asset_group_name']}}</option>
                            
                            @foreach($account as $akun)
                            
                            <option value="{{ $akun->account_type_name }}">{{ $akun->account_type_name }}</option>
    
                            @endforeach
    
                        </select>

                        @if ($errors->has('asset_group_name'))
                        <span><p style="color: red">{{ $errors->first('asset_group_name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$groups['description']}}" placeholder="Masukkan Deskripsi">
                        
                        @if ($errors->has('description'))
                        <span><p style="color: red">{{ $errors->first('description') }}</p></span>
                        @endif

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
                </form>
        </div>
    </div>
</div>
@endforeach


<!-- Modal Hapus Data -->
@foreach($assetGroup as $groups)
<div class="modal fade" id="deleteData{{$groups['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="/admin/{{$groups->id}}/deleteAssetGroup" class="btn btn-danger">Hapus</a>
            </div> 
        </div>
    </div>
</div>
@endforeach

@endsection