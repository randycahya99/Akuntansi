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
        <center><h2>Laporan Arus Kas</h2></center>
    </div>
    <div>
        <div>
            <table border="1" style="font-family: sans-serif; color: #232323; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: center">
                        <th style="border: 1px solid #999; padding: 8px 20px;">Tanggal</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;">No. Referensi</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;">Nama</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;">Deskripsi</th>
                        <th style="border: 1px solid #999; padding: 8px 20px;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cash as $kas)
                    <tr>
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{ $kas['date'] }}</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{ $kas['reference'] }}</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{ $kas['name'] }}</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">{{ $kas['description'] }}</td>
                        <td style="border: 1px solid #999; padding: 8px 20px;">
                            @if ($kas['cash_type'] == 'Kas Keluar')
                                ( @currency($kas->total) )
                            @else
                            @currency($kas->total)
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                    <td colspan="4" style="text-align: right;border: 1px solid #999; padding: 8px 20px;">Total Kas</td>
                    <td style="border: 1px solid #999; padding: 8px 20px;">@currency($totalCash)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>