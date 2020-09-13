@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Jenis Akun</h2>
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
                            <th>Kode Jenis</th>
                            <th>Jenis Akun</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($accountJenis as $indexKey => $jenis)
                                <tr>
                                    <td style="text-align: center">{{ $indexKey+1 }}</td>
                                    <td>{{ $jenis->jenis_code }}</td>
                                    <td>{{ $jenis->account_jenis_name }}</td>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-info btn-sm" title="Preview" data-toggle="modal" data-target="#showData{{$jenis['id']}}" style="margin-left: -20px">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$jenis['id']}}">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#deleteData{{$jenis['id']}}" style="margin-right: -20px">
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
            <form action="/admin/addJenis" method="POST">
                @csrf
                <div class="form-group">
                    <label>Kode Jenis</label>
                    <input type="text" class="form-control" name="jenis_code" id="jenis_code" placeholder="Masukkan Kode Jenis Akun">
                    
                    @if ($errors->has('jenis_code'))
                    <span><p style="color: red">{{ $errors->first('jenis_code') }}</p></span>
                    @endif
            
                </div>
                <div class="form-group">
                    <label>Jenis Akun</label>
                    <input type="text" class="form-control" name="account_jenis_name" id="account_jenis_name" placeholder="Masukkan Jenis Akun">
                    @if ($errors->has('account_jenis_name'))
                    <span><p style="color: red">{{ $errors->first('account_jenis_name') }}</p></span>
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
@foreach($accountJenis as $jenis)
<div class="modal fade" id="showData{{$jenis['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label>Kode Jenis</label>
                        <input type="text" class="form-control" name="jenis_code" id="jenis_code" value="{{$jenis['jenis_code']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jenis Akun</label>
                        <input type="text" class="form-control" name="account_jenis_name" id="account_jenis_name" value="{{$jenis['account_jenis_name']}}" readonly>
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
@foreach($accountJenis as $jenis)
<div class="modal fade" id="editData{{$jenis['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/admin/{{$jenis->id}}/updateJenis" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Kode Jenis</label>
                        <input type="text" class="form-control" name="jenis_code" id="jenis_code" value="{{$jenis['jenis_code']}}" placeholder="Masukkan Kode Jenis Akun">
                        
                        @if ($errors->has('jenis_code'))
                        <span><p style="color: red">{{ $errors->first('jenis_code') }}</p></span>
                        @endif
                    
                    </div>
                    <div class="form-group">
                        <label>Jenis Akun</label>
                        <input type="text" class="form-control" name="account_jenis_name" id="account_jenis_name" value="{{$jenis['account_jenis_name']}}" placeholder="Masukkan Jenis Akun">

                        @if ($errors->has('account_jenis_name'))
                        <span><p style="color: red">{{ $errors->first('account_jenis_name') }}</p></span>
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
@foreach($accountJenis as $jenis)
<div class="modal fade" id="deleteData{{$jenis['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/admin/{{$jenis->id}}/deleteJenis" class="btn btn-danger">Hapus</a>
            </div> 
        </div>
    </div>
</div>
@endforeach

@endsection