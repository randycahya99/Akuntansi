@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Jurnal Umum</h2>
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
                            <th>Deskripsi</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($journal as $indexKey => $journals)
                                <tr>
                                    <td style="text-align: center">{{ $indexKey+1 }}</td>
                                    <td>{{ $journals->trans_date }}</td>
                                    <td>{{ $journals->reference }}</td>
                                    <td>{{ $journals->description }}</td>
                                    <td>@currency($journals->debit)</td>
                                    {{-- <td>{{ $journals->debit }}</td> --}}
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-info btn-sm" title="Preview" data-toggle="modal" data-target="#showData{{$journals['id']}}" style="margin-left: -20px">
                                            <i class="mdi mdi-eye"></i>
                                        </button>

                                        @if ($journals['posting'] == 'no')
                                        <button type="button" class="btn btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$journals['id']}}">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>

                                        {{-- @if ($journals['posting'] == 'no') --}}
                                        <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#deleteData{{$journals['id']}}" style="margin-right: -20px">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                        @endif

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
                <form action="/admin/addJournal" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="date form-control" name="trans_date" id="trans_date" placeholder="Masukkan Tanggal Transaksi">
                    
                        @if ($errors->has('trans_date'))
                        <span><p style="color: red">{{ $errors->first('rate') }}</p></span>
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
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Masukkan Deskripsi">
                    
                        @if ($errors->has('description'))
                        <span><p style="color: red">{{ $errors->first('description') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Akun Debit</label>
                        <select class="form-control" name="debit_account" id="debit_account">
                            <option value="" selected>Pilih Akun Debit</option>
                            
                            @foreach($account as $akun)
                            
                            <option value="{{ $akun->account_name }}">{{ $akun->account_name }}</option>

                            @endforeach

                        </select>

                        @if ($errors->has('debit_account'))
                        <span><p style="color: red">{{ $errors->first('debit_account') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Akun Kredit</label>
                        <select class="form-control" name="kredit_account" id="kredit_account">
                            <option value="" selected>Pilih Akun Kredit</option>
                            
                            @foreach($account as $akun)
                            
                            <option value="{{ $akun->account_name }}">{{ $akun->account_name }}</option>

                            @endforeach

                        </select>

                        @if ($errors->has('kredit_account'))
                        <span><p style="color: red">{{ $errors->first('kredit_account') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Debit</label>
                        <input type="text" class="form-control" name="debit" id="debit" placeholder="Masukkan Total Debit">
                    
                        @if ($errors->has('debit'))
                        <span><p style="color: red">{{ $errors->first('debit') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Kredit</label>
                        <input type="text" class="form-control" name="kredit" id="kredit" placeholder="Masukkan Total Kredit">
                    
                        @if ($errors->has('kredit'))
                        <span><p style="color: red">{{ $errors->first('kredit') }}</p></span>
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
@foreach($journal as $journals)
<div class="modal fade" id="showData{{$journals['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="trans_date" id="trans_date" value="{{$journals['trans_date']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>No. Referensi</label>
                        <input type="text" class="form-control" name="reference" id="reference" value="{{$journals['reference']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$journals['description']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Akun Debit</label>
                        <input type="text" class="form-control" name="debit_account" id="debit_account" value="{{$journals['debit_account']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Akun Kredit</label>
                        <input type="text" class="form-control" name="kredit_account" id="kredit_account" value="{{$journals['kredit_account']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Debit</label>
                        <input type="text" class="form-control" name="debit" id="debit" value="@currency($journals->debit)" readonly>
                    </div>
                    <div class="form-group">
                        <label>Kredit</label>
                        <input type="text" class="form-control" name="kredit" id="kredit" value="@currency($journals->kredit)" readonly>
                    </div>
                    @if($journals['posting'] == 'no')
                    <div class="form-group">
                        <a href="/admin/{{$journals->id}}/postingToLedger" class="btn btn-success" title="Posting to General Ledger"><i class="mdi mdi-book-open-variant"></i></a>
                    </div>
                    @endif
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
@foreach($journal as $journals)
<div class="modal fade" id="editData{{$journals['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/admin/{{$journals->id}}/updateJournal" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="trans_date" id="trans_date" value="{{$journals['trans_date']}}" placeholder="Masukkan Tanggal Transaksi">
                    
                        @if ($errors->has('trans_date'))
                        <span><p style="color: red">{{ $errors->first('trans_date') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>No. Referensi</label>
                        <input type="text" class="form-control" name="reference" id="reference" value="{{$journals['reference']}}" placeholder="Masukkan No. Referensi">
                    
                        @if ($errors->has('reference'))
                        <span><p style="color: red">{{ $errors->first('reference') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$journals['description']}}" placeholder="Masukkan Deskripsi">
                    
                        @if ($errors->has('description'))
                        <span><p style="color: red">{{ $errors->first('description') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Akun Debit</label>
                        <select class="form-control" name="debit_account" id="debit_account">
                            <option value="{{$journals['debit_account']}}" selected>{{$journals['debit_account']}}</option>
                            
                            @foreach($account as $akun)
                            
                            <option value="{{ $akun->account_name }}">{{ $akun->account_name }}</option>

                            @endforeach

                        </select>

                        @if ($errors->has('debit_account'))
                        <span><p style="color: red">{{ $errors->first('debit_account') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Akun Kredit</label>
                        <select class="form-control" name="kredit_account" id="kredit_account">
                            <option value="{{$journals['kredit_account']}}" selected>{{$journals['kredit_account']}}</option>
                            
                            @foreach($account as $akun)
                            
                            <option value="{{ $akun->account_name }}">{{ $akun->account_name }}</option>

                            @endforeach

                        </select>

                        @if ($errors->has('kredit_account'))
                        <span><p style="color: red">{{ $errors->first('kredit_account') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Debit</label>
                        <input type="text" class="form-control" name="debit" id="debit" value="{{$journals['debit']}}" placeholder="Masukkan Total Debit">
                    
                        @if ($errors->has('debit'))
                        <span><p style="color: red">{{ $errors->first('debit') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Kredit</label>
                        <input type="text" class="form-control" name="kredit" id="kredit" value="{{$journals['kredit']}}" placeholder="Masukkan Total Kredit">
                    
                        @if ($errors->has('kredit'))
                        <span><p style="color: red">{{ $errors->first('kredit') }}</p></span>
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
@foreach($journal as $journals)
<div class="modal fade" id="deleteData{{$journals['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/admin/{{$journals->id}}/deleteJournal" class="btn btn-danger">Hapus</a>
            </div> 
        </div>
    </div>
</div>
@endforeach

@endsection