@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="card-body">
                                    <form action="/admin/cetakArusKas">
                                        @csrf
                                        <div>
                                            <button class="btn btn-primary btn-sm"><a id="pdf"  target="_blank"><i class="fa fa-print"> Export PDF</i></a></button>
                                        </div>
                                        <div style="overflow:auto; height: 80vh;" class="m-2">
                                            <div style="background-color: white; color: black;" class="mx-5 p-3">
                                                <center class="mb-4">
                                                    <h4>Laporan Arus Kas</h4>
                                                </center>
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr style="text-align: center">
                                                            <th>Tanggal</th>
                                                            <th>No. Referensi</th>
                                                            <th>Nama</th>
                                                            <th>Deskripsi</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($cash as $kas)
                                                        <tr>
                                                            <td>{{ $kas['date'] }}</td>
                                                            <td>{{ $kas['reference'] }}</td>
                                                            <td>{{ $kas['name'] }}</td>
                                                            <td>{{ $kas['description'] }}</td>
                                                            <td>
                                                                @if ($kas['cash_type'] == 'Kas Keluar')
                                                                    ( @currency($kas->total) )
                                                                @else
                                                                @currency($kas->total)
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                        <td colspan="4" style="text-align: right">Total Kas</td>
                                                        <td>@currency($totalCash)</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection