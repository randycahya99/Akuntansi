@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Akun</h2>
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
                                <th>Kode Akun</th>
                                <th>Nama Akun</th>
                                <th>Saldo</th>
                                <th>Jenis</th>
                                <th>Klasifikasi</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($account as $indexKey => $akun)
                                    <tr>
                                        <td style="text-align: center">{{ $indexKey+1 }}</td>
                                        <td>{{ $akun->account_code }}</td>
                                        <td>{{ $akun->account_name }}</td>
                                        <td>@currency($akun->saldo_account)</td>
                                        {{-- <td>{{ $akun->saldo_account }}</td> --}}
                                        <td>{{ $akun->account_jenis_name }}</td>
                                        <td>{{ $akun->account_type_name }}</td>
                                        <td style="text-align: center">
                                            <button type="button" class="btn btn-info btn-sm" title="Preview" data-toggle="modal" data-target="#showData{{$akun['id']}}" style="margin-left: -20px">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$akun['id']}}">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#deleteData{{$akun['id']}}" style="margin-right: -20px">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No records found.</td>
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
                <form action="/admin/addAccount" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Kode Akun</label>
                        <input type="text" class="form-control" name="account_code" id="account_code" placeholder="Masukkan Kode Akun">

                        @if ($errors->has('account_code'))
                        <span><p style="color: red">{{ $errors->first('account_code') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Nama Akun</label>
                        <input type="text" class="form-control" name="account_name" id="account_name" placeholder="Masukkan Nama Akun">

                        @if ($errors->has('account_name'))
                        <span><p style="color: red">{{ $errors->first('account_name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Saldo Akun</label>
                        <input type="text" class="form-control" name="saldo_account" id="saldo_account" placeholder="Masukkan Saldo Akun">

                        @if ($errors->has('saldo_account'))
                        <span><p style="color: red">{{ $errors->first('saldo_account') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <select class="form-control" name="account_jenis_name" id="account_jenis_name">
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
                        <select class="form-control" name="account_type_name" id="account_type_name">
                            <option value="" selected>Pilih Tipe Akun</option>

                            @foreach($account_type as $type)
                            
                            <option value="{{ $type->account_type_name }}">{{ $type->account_type_name }}</option>

                            @endforeach
                            
                        </select>

                        @if ($errors->has('account_type_name'))
                        <span><p style="color: red">{{ $errors->first('account_type_name') }}</p></span>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Lihat Data -->
@foreach($account as $akun)
<div class="modal fade" id="showData{{$akun['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label>Kode Akun</label>
                        <input type="text" class="form-control" name="account_code" id="account_code" value="{{$akun['account_code']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Akun</label>
                        <input type="text" class="form-control" name="account_name" id="account_name" value="{{$akun['account_name']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Saldo Akun</label>
                        <input type="text" class="form-control" name="saldo_account" id="saldo_account" value="@currency($akun->saldo_account)" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <input type="text" class="form-control" name="account_jenis_name" id="account_jenis_name" value="{{$akun['account_jenis_name']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Klasifikasi</label>
                        <input type="text" class="form-control" name="account_type_name" id="account_type_name" value="{{$akun['account_type_name']}}" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


<!-- Modal Edit Data -->
@foreach($account as $akun)
<div class="modal fade" id="editData{{$akun['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/{{$akun->id}}/updateAccount" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Kode Akun</label>
                        <input type="text" class="form-control" name="account_code" id="account_code" value="{{$akun['account_code']}}" placeholder="Masukkan Kode Akun">

                        @if ($errors->has('account_code'))
                        <span><p style="color: red">{{ $errors->first('type_code') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Nama Akun</label>
                        <input type="text" class="form-control" name="account_name" id="account_name" value="{{$akun['account_name']}}" placeholder="Masukkan Nama Akun">

                        @if ($errors->has('account_name'))
                        <span><p style="color: red">{{ $errors->first('type_code') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Saldo Akun</label>
                        <input type="text" class="form-control" name="saldo_account" id="saldo_account" value="{{$akun['saldo_account']}}" placeholder="Masukkan Saldo Akun">

                        @if ($errors->has('saldo_account'))
                        <span><p style="color: red">{{ $errors->first('saldo_account') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <select class="form-control" name="account_jenis_name" id="account_jenis_name">
                            <option value="{{$akun['account_jenis_name']}}" selected>{{$akun['account_jenis_name']}}</option>
                            
                            @foreach($account_jenis as $jenis)
                            
                            <option value="{{ $jenis->jenis_code }}">{{ $jenis->account_jenis_name }}</option>

                            @endforeach

                        </select>

                        @if ($errors->has('account_jenis_name'))
                        <span><p style="color: red">{{ $errors->first('account_jenis_name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Klasifikasi</label>
                        <select class="form-control" name="account_type_name" id="account_type_name">
                            <option value="{{$akun['account_type_name']}}" selected>{{$akun['account_type_name']}}</option>

                            @foreach($account_type as $type)
                            
                            <option value="{{ $type->account_type_name }}">{{ $type->account_type_name }}</option>

                            @endforeach
                            
                        </select>

                        @if ($errors->has('account_type_name'))
                        <span><p style="color: red">{{ $errors->first('account_type_name') }}</p></span>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


<!-- Modal Hapus Data -->
@foreach($account as $akun)
<div class="modal fade" id="deleteData{{$akun['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/admin/{{$akun->id}}/deleteAccount" class="btn btn-danger">Hapus</a>
            </div> 
        </div>
    </div>
</div>
@endforeach

@endsection