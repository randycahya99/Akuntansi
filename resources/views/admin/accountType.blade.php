@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Klasifikasi Akun</h2>
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
                                <th>Kode Tipe</th>
                                <th>Jenis</th>
                                <th>Klasifikasi</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($accountType as $indexKey => $types)
                                    <tr>
                                        <td style="text-align: center">{{ $indexKey+1 }}</td>
                                        <td>{{ $types->type_code }}</td>
                                        <td>{{ $types->account_jenis_name }}</td>
                                        <td>{{ $types->account_type_name }}</td>
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
                <form action="/admin/addType" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Kode Tipe</label>
                        <input type="text" class="form-control" name="type_code" id="type_code" placeholder="Masukkan Kode Tipe Akun">

                        @if ($errors->has('type_code'))
                        <span><p style="color: red">{{ $errors->first('type_code') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <select class="form-control" name="account_jenis_name" id="account_jenis_name" placeholder="Pilih Jenis Akun">
                            <option value="" selected>Pilih Jenis Akun</option>

                            @foreach($account_jenis as $jenis)
                            
                            <option value="{{ $jenis->account_jenis_name }}">{{ $jenis->account_jenis_name }}</option>

                            @endforeach

                        </select>

                        @if ($errors->has('account_jenis_name'))
                        <span><p style="color: red">{{ $errors->first('account_jenis_name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Klasifikasi</label>
                        <input type="text" class="form-control" name="account_type_name" id="account_type_name" placeholder="Masukkan Klasifikasi Akun">

                        @if ($errors->has('account_type_name'))
                        <span><p style="color: red">{{ $errors->first('account_type_name') }}</p></span>
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
@foreach($accountType as $types)
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
                        <label>Kode Tipe</label>
                        <input type="text" class="form-control" name="type_code" id="type_code" value="{{$types['type_code']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jenis Akun</label>
                        <input type="text" class="form-control" name="account_jenis_name" id="account_jenis_name" value="{{$types['account_jenis_name']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Klasifikasi</label>
                        <input type="text" class="form-control" name="account_type_name" id="account_type_name" value="{{$types['account_type_name']}}" readonly>
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
@foreach($accountType as $types)
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
                <form action="/admin/{{$types->id}}/updateType" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Kode Tipe</label>
                        <input type="text" class="form-control" name="type_code" id="type_code" value="{{$types['type_code']}}" placeholder="Masukkan Kode Tipe Akun">
                        
                        @if ($errors->has('type_code'))
                        <span><p style="color: red">{{ $errors->first('type_code') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <select class="form-control" name="account_jenis_name" id="account_jenis_name" placeholder="Pilih Jenis Akun">
                            <option value="{{$types['account_jenis_name']}}" selected>{{$types['account_jenis_name']}}</option>

                            @foreach($account_jenis as $jenis)
                            
                            <option value="{{ $jenis->account_jenis_name }}">{{ $jenis->account_jenis_name }}</option>

                            @endforeach

                        </select>

                        @if ($errors->has('account_jenis_name'))
                        <span><p style="color: red">{{ $errors->first('account_jenis_name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Klasifikasi</label>
                        <input type="text" class="form-control" name="account_type_name" id="account_type_name" value="{{$types['account_type_name']}}" placeholder="Masukkan Klasifikasi Akun">

                        @if ($errors->has('account_type_name'))
                        <span><p style="color: red">{{ $errors->first('account_type_name') }}</p></span>
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
@foreach($accountType as $types)
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
                <a href="/admin/{{$types->id}}/deleteType" class="btn btn-danger">Hapus</a>
            </div> 
        </div>
    </div>
</div>
@endforeach

@endsection