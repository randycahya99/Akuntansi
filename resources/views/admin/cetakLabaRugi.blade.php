<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ URL::asset('admin/assets/img/logo.png') }}" rel="shortcut icon" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/css/sleek.css') }}"> --}}
    <title>Document</title>
</head>
<body>
    
    <div>
        <center><h1>CV. Reksa Karya</h1></center>
    </div>
    <div>
        <center><h2>Laporan Laba Rugi</h2></center>
    </div>
    <div>
        <div>
            <center>
                <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th colspan="4" style="border: 1px solid #999; padding: 8px 20px;">Pendapatan</th>
                        </tr>
                        <tr style="text-align: center">
                            <th colspan="3" style="border: 1px solid #999; padding: 8px 20px;">Akun</th>
                            <th style="border: 1px solid #999; padding: 8px 20px;">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendapatan as $pendapatans)
                        <tr>
                            <td colspan="3" style="border: 1px solid #999; padding: 8px 20px;">{{ $pendapatans['account_name'] }}</td>
                            <td style="border: 1px solid #999; padding: 8px 20px;">@currency($pendapatans->saldo_account)</td>
                        </tr>
                        @endforeach
                        <tr>
                        <td colspan="3" style="text-align: right;border: 1px solid #999; padding: 8px 20px;">Total</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">@currency($totalPendapatan)</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th colspan="4" style="border: 1px solid #999; padding: 8px 20px;">Beban</th>
                        </tr>
                        <tr style="text-align: center">
                            <th colspan="3" style="border: 1px solid #999; padding: 8px 20px;">Akun</th>
                            <th style="border: 1px solid #999; padding: 8px 20px;">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengeluaran as $pengeluarans)
                        <tr>
                            <td colspan="3" style="border: 1px solid #999; padding: 8px 20px;">{{ $pengeluarans['account_name'] }}</td>
                            <td style="border: 1px solid #999; padding: 8px 20px;">@currency($pengeluarans->saldo_account)</td>
                        </tr>
                        @endforeach
                        <tr>
                        <td colspan="3" style="text-align: right;border: 1px solid #999; padding: 8px 20px;">Total</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">@currency($totalPengeluaran)</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th colspan="4" style="border: 1px solid #999; padding: 8px 20px;"></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th colspan="3" style="border: 1px solid #999; padding: 8px 20px;">Laba Kotor</th>
                            <th style="border: 1px solid #999; padding: 8px 20px;">@currency($LabaRugi)</th>
                        </tr>
                    </thead>
                </table>
            </center>
        </div>
    </div>

</body>
</html>