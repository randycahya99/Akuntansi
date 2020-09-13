@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Kas Masuk</h2>
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
                            <th>Tanggal</th>
                            <th>No. Referensi</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Total</th>
                            <th>Posting</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($cash as $indexKey => $incomeCash)
                                <tr>
                                    <td style="text-align: center">{{ $indexKey+1 }}</td>
                                    <td>{{ $incomeCash->date }}</td>
                                    <td>{{ $incomeCash->reference }}</td>
                                    <td>{{ $incomeCash->name }}</td>
                                    <td>{{ $incomeCash->description }}</td>
                                    <td>@currency($incomeCash->total)</td>
                                    
                                    @if ($incomeCash['posting'] == 'no')
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-success btn-sm" title="Posting to Journal" data-toggle="modal" data-target="#postingData{{$incomeCash['id']}}">
                                            <i class="mdi mdi-book-open-variant"></i>
                                        </button>
                                    </td>
                                    @else
                                    <td style="text-align: center">
                                        Sudah posting
                                    </td>
                                    @endif

                                    {{-- <td>{{ $incomeCash->total }}</td> --}}
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-info btn-sm" title="Preview" data-toggle="modal" data-target="#showData{{$incomeCash['id']}}" style="margin-left: -20px">
                                            <i class="mdi mdi-eye"></i>
                                        </button>

                                        @if ($incomeCash['posting'] == 'no')
                                        <button type="button" class="btn btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$incomeCash['id']}}">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#deleteData{{$incomeCash['id']}}" style="margin-right: -20px">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No records found.</td>
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
                <form action="/admin/addCash" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="date" id="date" placeholder="Masukkan Tanggal Transaksi">
                    
                        @if ($errors->has('date'))
                        <span><p style="color: red">{{ $errors->first('date') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>No. Referensi</label>
                        <input type="text" class="form-control" name="reference" id="reference" placeholder="Masukkan No. Referensi">
                    
                        @if ($errors->has('reference'))
                        <span><p style="color: red">{{ $errors->first('reference') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Akun Kas</label>
                        <select class="form-control" name="account_name" id="account_name">
                            <option value="" selected>Pilih Akun Kas</option>
                            
                            @foreach($account as $akun)
                            
                            <option value="{{ $akun->account_name }}">{{ $akun->account_name }}</option>

                            @endforeach

                        </select>

                        @if ($errors->has('account_name'))
                        <span><p style="color: red">{{ $errors->first('account_name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Penerima">
                    
                        @if ($errors->has('name'))
                        <span><p style="color: red">{{ $errors->first('name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Masukkan Deskripsi">
                    
                        @if ($errors->has('description'))
                        <span><p style="color: red">{{ $errors->first('description') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control" name="total" id="total" placeholder="Masukkan Total">
                    
                        @if ($errors->has('total'))
                        <span><p style="color: red">{{ $errors->first('total') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="cash_type" id="cash_type" value="{{$incomeCash['cash_type'] = 'Kas Masuk'}}" hidden>
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
@foreach($cash as $incomeCash)
<div class="modal fade" id="showData{{$incomeCash['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{$incomeCash['date']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>No. Referensi</label>
                        <input type="text" class="form-control" name="reference" id="reference" value="{{$incomeCash['reference']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Akun Kas</label>
                        <input type="text" class="form-control" name="account_name" id="account_name" value="{{$incomeCash['account_name']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$incomeCash['name']}}"readonly>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$incomeCash['description']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control" name="total" id="total" value="@currency($incomeCash->total)" readonly>
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
@foreach($cash as $incomeCash)
<div class="modal fade" id="editData{{$incomeCash['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/admin/{{$incomeCash->id}}/updateIncomeCash" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{$incomeCash['date']}}" placeholder="Masukkan Tanggal Transaksi">
                    
                        @if ($errors->has('date'))
                        <span><p style="color: red">{{ $errors->first('date') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>No. Referensi</label>
                        <input type="text" class="form-control" name="reference" id="reference" value="{{$incomeCash['reference']}}" placeholder="Masukkan No. Referensi">
                    
                        @if ($errors->has('reference'))
                        <span><p style="color: red">{{ $errors->first('reference') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Akun Kas</label>
                        <select class="form-control" name="account_name" id="account_name">
                            <option value="{{$incomeCash['account_name']}}" selected>{{$incomeCash['account_name']}}</option>
                            
                            @foreach($account as $akun)
                            
                            <option value="{{ $akun->account_name }}">{{ $akun->account_name }}</option>

                            @endforeach

                        </select>

                        @if ($errors->has('account_name'))
                        <span><p style="color: red">{{ $errors->first('account_name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$incomeCash['name']}}" placeholder="Masukkan Penerima">
                    
                        @if ($errors->has('name'))
                        <span><p style="color: red">{{ $errors->first('name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$incomeCash['description']}}" placeholder="Masukkan Deskripsi">
                    
                        @if ($errors->has('description'))
                        <span><p style="color: red">{{ $errors->first('description') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control" name="total" id="total" value="{{$incomeCash['total']}}" placeholder="Masukkan Total">
                    
                        @if ($errors->has('total'))
                        <span><p style="color: red">{{ $errors->first('total') }}</p></span>
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
@foreach($cash as $incomeCash)
<div class="modal fade" id="deleteData{{$incomeCash['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/admin/{{$incomeCash->id}}/deleteIncomeCash" class="btn btn-danger">Hapus</a>
            </div> 
        </div>
    </div>
</div>
@endforeach


<!-- Modal Posting Data -->
@foreach($cash as $incomeCash)
<div class="modal fade" id="postingData{{$incomeCash['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Posting Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/admin/{{$incomeCash->id}}/postingCash" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="trans_date" id="trans_date" value="{{$incomeCash['date']}}" placeholder="Masukkan Tanggal Transaksi" readonly>
                    
                        @if ($errors->has('trans_date'))
                        <span><p style="color: red">{{ $errors->first('trans_date') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>No. Referensi</label>
                        <input type="text" class="form-control" name="reference" id="reference" value="{{$incomeCash['reference']}}" placeholder="Masukkan No. Referensi" readonly>
                    
                        @if ($errors->has('reference'))
                        <span><p style="color: red">{{ $errors->first('reference') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$incomeCash['description']}}" placeholder="Masukkan Deskripsi" readonly>
                    
                        @if ($errors->has('description'))
                        <span><p style="color: red">{{ $errors->first('description') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Akun Debit</label>
                        <input type="text" class="form-control" name="debit_account" id="debit_account" value="{{$incomeCash['account_name']}}" placeholder="Masukkan Akun Debit" readonly>

                        @if ($errors->has('debit_account'))
                        <span><p style="color: red">{{ $errors->first('debit_account') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Akun Kredit</label>
                        <select class="form-control" name="kredit_account" id="kredit_account">
                            <option value="" selected>Pilih Akun Kredit</option>
                            
                            @foreach($akuns as $akunPosting)
                            
                            <option value="{{ $akunPosting->account_name }}">{{ $akunPosting->account_name }}</option>

                            @endforeach

                        </select>

                        @if ($errors->has('kredit_account'))
                        <span><p style="color: red">{{ $errors->first('kredit_account') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Debit</label>
                        <input type="text" class="form-control" name="debit" id="debit" value="{{$incomeCash['total']}}" placeholder="Masukkan Debit" readonly>
                    
                        @if ($errors->has('debit'))
                        <span><p style="color: red">{{ $errors->first('debit') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Kredit</label>
                        <input type="text" class="form-control" name="kredit" id="kredit" value="{{$incomeCash['total']}}" placeholder="Masukkan Kredit" readonly>
                    
                        @if ($errors->has('kredit'))
                        <span><p style="color: red">{{ $errors->first('kredit') }}</p></span>
                        @endif

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Posting</button>
            </div>
                </form>
        </div>
    </div>
</div>
@endforeach

@endsection