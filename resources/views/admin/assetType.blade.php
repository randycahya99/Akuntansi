@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Tipe Harta</h2>
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
                            <th>Tipe Harta</th>
                            <th>Jenis Harta</th>
                            <th>Qty</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($assetType as $indexKey => $types)
                                <tr>
                                    <td style="text-align: center">{{ $indexKey+1 }}</td>
                                    <td>{{ $types->asset_type_name }}</td>
                                    <td>{{ $types->asset_group_name }}</td>
                                    <td>{{ $types->qty }}</td>
                                    <td>{{ $types->description }}</td>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-info btn-sm" title="Preview" data-toggle="modal" data-target="#showData{{$types['id']}}" style="margin-left: -20px">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$types['id']}}">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#deleteData{{$types['id']}}" style="margin-right: -20px">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No records found.</td>
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
            <form action="/admin/addAssetType" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tipe Harta</label>
                    <input type="text" class="form-control" name="asset_type_name" id="asset_type_name" placeholder="Masukkan Tipe Harta">

                    @if ($errors->has('asset_type_name'))
                    <span><p style="color: red">{{ $errors->first('asset_type_name') }}</p></span>
                    @endif

                </div>
                <div class="form-group">
                    <label>Jenis Harta</label>
                    <select class="form-control" name="asset_group_name" id="asset_group_name" placeholder="Pilih Jenis Harta">
                        <option value="" selected>Pilih Jenis Harta</option>

                        @foreach ($asset_jenis as $jenis)
                        
                        <option value="{{ $jenis->asset_group_name }}">{{ $jenis->asset_group_name }}</option>
                        
                        @endforeach

                    </select>

                    @if ($errors->has('asset_group_name'))
                    <span><p style="color: red">{{ $errors->first('asset_group_name') }}</p></span>
                    @endif

                </div>
                <div class="form-group">
                    <label>Qty</label>
                    <input type="text" class="form-control" name="qty" id="qty" placeholder="Masukkan Jumlah Harta">
                    
                    @if ($errors->has('qty'))
                    <span><p style="color: red">{{ $errors->first('qty') }}</p></span>
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
@foreach($assetType as $types)
<div class="modal fade" id="showData{{$types['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label>Tipe Harta</label>
                        <input type="text" class="form-control" name="asset_type_name" id="asset_type_name" value="{{$types['asset_type_name']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jenis Harta</label>
                        <input type="text" class="form-control" name="asset_group_name" id="asset_group_name" value="{{$types['asset_group_name']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <input type="text" class="form-control" name="qty" id="qty" value="{{$types['qty']}}">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$types['description']}}">
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
@foreach($assetType as $types)
<div class="modal fade" id="editData{{$types['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/admin/{{$types->id}}/updateAssetType" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tipe Harta</label>
                        <input type="text" class="form-control" name="asset_type_name" id="asset_type_name" value="{{$types['asset_type_name']}}" placeholder="Masukkan Tipe Harta">
                    
                        @if ($errors->has('asset_type_name'))
                        <span><p style="color: red">{{ $errors->first('asset_type_name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Jenis Harta</label>
                        <select class="form-control" name="asset_group_name" id="asset_group_name" placeholder="Pilih Jenis Harta">
                            <option value="{{$types['asset_group_name']}}" selected>{{$types['asset_group_name']}}</option>
    
                            @foreach ($asset_jenis as $jenis)
                            
                            <option value="{{ $jenis->asset_group_name }}">{{ $jenis->asset_group_name }}</option>
                            
                            @endforeach
    
                        </select>

                        @if ($errors->has('asset_group_name'))
                        <span><p style="color: red">{{ $errors->first('asset_group_name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <input type="text" class="form-control" name="qty" id="qty" value="{{$types['qty']}}" placeholder="Masukkan Jumlah Harta">
                    
                        @if ($errors->has('qty'))
                        <span><p style="color: red">{{ $errors->first('qty') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$types['description']}}" placeholder="Masukkan Deskripsi">
                    
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
@foreach($assetType as $types)
<div class="modal fade" id="deleteData{{$types['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/admin/{{$types->id}}/deleteAssetType" class="btn btn-danger">Hapus</a>
            </div> 
        </div>
    </div>
</div>
@endforeach

@endsection