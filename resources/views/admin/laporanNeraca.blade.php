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
                                    <form action="/admin/cetakNeraca">
                                        @csrf
                                        <div>
                                            <button class="btn btn-primary btn-sm"><a id="pdf"  target="_blank"><i class="fa fa-print"> Export PDF</i></a></button>
                                        </div>
                                        <div style="overflow:auto; height: 80vh;" class="m-2">
                                            <div style="background-color: white; color: black;" class="mx-5 p-3">
                                                <center class="mb-4">
                                                    <h4>Laporan Neraca</h4>
                                                </center>
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="4">Harta</th>
                                                        </tr>
                                                        <tr style="text-align: center">
                                                            <th>Tanggal</th>
                                                            <th>No. Referensi</th>
                                                            <th>Akun</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($asset as $harta)
                                                        <tr>
                                                            <td>{{ $harta['trans_date'] }}</td>
                                                            <td>{{ $harta['reference'] }}</td>
                                                            <td>{{ $harta['debit_account'] }}</td>
                                                            <td>@currency($harta->debit)</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                        <td colspan="3" style="text-align: right">Total</td>
                                                        <td>@currency($totalHarta)</td>
                                                        </tr>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th colspan="4">Kewajiban</th>
                                                        </tr>
                                                        <tr style="text-align: center">
                                                            <th>Tanggal</th>
                                                            <th>No. Referensi</th>
                                                            <th>Akun</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($liabilities as $kewajiban)
                                                        <tr>
                                                            <td>{{ $kewajiban['trans_date'] }}</td>
                                                            <td>{{ $kewajiban['reference'] }}</td>
                                                            <td>{{ $kewajiban['kredit_account'] }}</td>
                                                            <td>@currency($kewajiban->kredit)</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                        <td colspan="3" style="text-align: right">Total</td>
                                                        <td>@currency($totalKewajiban)</td>
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