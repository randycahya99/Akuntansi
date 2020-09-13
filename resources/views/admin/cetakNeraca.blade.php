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
        <center><h2>Laporan Neraca</h2></center>
    </div>
    <div>
        <div>
            <center>
                <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th colspan="4" style="border: 1px solid #999; padding: 8px 20px;">Harta</th>
                        </tr>
                        <tr style="text-align: center">
                            <th style="border: 1px solid #999; padding: 8px 20px;">Tanggal</th>
                            <th style="border: 1px solid #999; padding: 8px 20px;">No. Referensi</th>
                            <th style="border: 1px solid #999; padding: 8px 20px;">Akun</th>
                            <th style="border: 1px solid #999; padding: 8px 20px;">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asset as $harta)
                        <tr>
                            <td style="border: 1px solid #999; padding: 8px 20px;">{{ $harta['trans_date'] }}</td>
                            <td style="border: 1px solid #999; padding: 8px 20px;">{{ $harta['reference'] }}</td>
                            <td style="border: 1px solid #999; padding: 8px 20px;">{{ $harta['debit_account'] }}</td>
                            <td style="border: 1px solid #999; padding: 8px 20px;">@currency($harta->debit)</td>
                        </tr>
                        @endforeach
                        <tr>
                        <td colspan="3" style="text-align: right;border: 1px solid #999; padding: 8px 20px;">Total</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">@currency($totalHarta)</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th colspan="4" style="border: 1px solid #999; padding: 8px 20px;">Kewajiban</th>
                        </tr>
                        <tr style="text-align: center">
                            <th style="border: 1px solid #999; padding: 8px 20px;">Tanggal</th>
                            <th style="border: 1px solid #999; padding: 8px 20px;">No. Referensi</th>
                            <th style="border: 1px solid #999; padding: 8px 20px;">Akun</th>
                            <th style="border: 1px solid #999; padding: 8px 20px;">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($liabilities as $kewajiban)
                        <tr>
                            <td style="border: 1px solid #999; padding: 8px 20px;">{{ $kewajiban['trans_date'] }}</td>
                            <td style="border: 1px solid #999; padding: 8px 20px;">{{ $kewajiban['reference'] }}</td>
                            <td style="border: 1px solid #999; padding: 8px 20px;">{{ $kewajiban['kredit_account'] }}</td>
                            <td style="border: 1px solid #999; padding: 8px 20px;">@currency($kewajiban->kredit)</td>
                        </tr>
                        @endforeach
                        <tr>
                        <td colspan="3" style="text-align: right;border: 1px solid #999; padding: 8px 20px;">Total</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">@currency($totalKewajiban)</td>
                        </tr>
                    </tbody>
                </table>
            </center>
        </div>
    </div>

</body>
</html>