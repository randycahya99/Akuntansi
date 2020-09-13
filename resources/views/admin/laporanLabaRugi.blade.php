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
                                    <form action="/admin/cetakLabaRugi">
                                        @csrf
                                        <div>
                                            <button class="btn btn-primary btn-sm"><a id="pdf"  target="_blank"><i class="fa fa-print"> Export PDF</i></a></button>
                                        </div>
                                        <div style="overflow:auto; height: 80vh;" class="m-2">
                                            <div style="background-color: white; color: black;" class="mx-5 p-3">
                                                <center class="mb-4">
                                                    <h4>Laporan Laba Rugi</h4>
                                                </center>
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2">Pendapatan</th>
                                                        </tr>
                                                        <tr style="text-align: center">
                                                            <th>Akun</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pendapatan as $pendapatans)
                                                        <tr>
                                                            <td>{{ $pendapatans['account_name'] }}</td>
                                                            <td>@currency($pendapatans->saldo_account)</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                        <td colspan="1" style="text-align: right">Total Pendapatan</td>
                                                        <td>@currency($totalPendapatan)</td>
                                                        </tr>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2">Beban</th>
                                                        </tr>
                                                        <tr style="text-align: center">
                                                            <th>Akun</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pengeluaran as $pengeluarans)
                                                        <tr>
                                                            <td>{{ $pengeluarans['account_name'] }}</td>
                                                            <td>@currency($pengeluarans->saldo_account)</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                        <td colspan="1" style="text-align: right">Total Pengeluaran</td>
                                                        <td>@currency($totalPengeluaran)</td>
                                                        </tr>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2"></th>
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                        <tr>
                                                            <th>Laba Kotor</th>
                                                            <th>@currency($LabaRugi)</th>
                                                        </tr>
                                                    </thead>
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