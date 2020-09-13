@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Pajak</h2>
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
                            <th>Kode Pajak</th>
                            <th>Jenis Pajak</th>
                            <th>Persentase (%)</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($tax as $indexKey => $taxes)
                                <tr>
                                    <td style="text-align: center">{{ $indexKey+1 }}</td>
                                    <td>{{ $taxes->tax_code }}</td>
                                    <td>{{ $taxes->tax_name }}</td>
                                    <td>{{ $taxes->rate }}</td>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-info btn-sm" title="Preview" data-toggle="modal" data-target="#showData{{$taxes['id']}}" style="margin-left: -20px">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$taxes['id']}}">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#deleteData{{$taxes['id']}}" style="margin-right: -20px">
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
                <form action="/admin/addTax" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Kode Pajak</label>
                        <input type="text" class="form-control" name="tax_code" id="tax_code" placeholder="Masukkan Kode Pajak">
                    
                        @if ($errors->has('tax_code'))
                        <span><p style="color: red">{{ $errors->first('tax_code') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Jenis Pajak</label>
                        <input type="text" class="form-control" name="tax_name" id="tax_name" placeholder="Masukkan Jenis Pajak">
                    
                        @if ($errors->has('tax_name'))
                        <span><p style="color: red">{{ $errors->first('tax_name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Persentase (%)</label>
                        <input type="text" class="form-control" name="rate" id="rate" placeholder="Masukkan Persentase Pajak">
                    
                        @if ($errors->has('rate'))
                        <span><p style="color: red">{{ $errors->first('rate') }}</p></span>
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
@foreach($tax as $taxes)
<div class="modal fade" id="showData{{$taxes['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label>Kode Pajak</label>
                        <input type="text" class="form-control" name="tax_code" id="tax_code" value="{{$taxes['tax_code']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pajak</label>
                        <input type="text" class="form-control" name="tax_name" id="tax_name" value="{{$taxes['tax_name']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Persentase (%)</label>
                        <input type="text" class="form-control" name="rate" id="rate" value="{{$taxes['rate']}}" readonly>
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
@foreach($tax as $taxes)
<div class="modal fade" id="editData{{$taxes['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/admin/{{$taxes->id}}/updateTax" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Kode Pajak</label>
                        <input type="text" class="form-control" name="tax_code" id="tax_code" value="{{$taxes['tax_code']}}" placeholder="Masukkan Kode Pajak">
                    
                        @if ($errors->has('tax_code'))
                        <span><p style="color: red">{{ $errors->first('tax_code') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Jenis Pajak</label>
                        <input type="text" class="form-control" name="tax_name" id="tax_name" value="{{$taxes['tax_name']}}" placeholder="Masukkan Jenis Pajak">
                    
                        @if ($errors->has('tax_name'))
                        <span><p style="color: red">{{ $errors->first('tax_name') }}</p></span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Persentase (%)</label>
                        <input type="text" class="form-control" name="rate" id="rate" value="{{$taxes['rate']}}" placeholder="Masukkan Persentase Pajak">
                    
                        @if ($errors->has('rate'))
                        <span><p style="color: red">{{ $errors->first('rate') }}</p></span>
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
@foreach($tax as $taxes)
<div class="modal fade" id="deleteData{{$taxes['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/admin/{{$taxes->id}}/deleteTax" class="btn btn-danger">Hapus</a>
            </div> 
        </div>
    </div>
</div>
@endforeach

@endsection