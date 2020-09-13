@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Buku Besar</h2>
                </div>
                <div class="card-body">
                    
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <table class="table table-bordered table-stripped data">
                        <thead style="text-align: center">
                            <th>Tanggal</th>
                            <th>No. Referensi</th>
                            <th>Akun</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                        </thead>
                        <tbody>
                            @forelse ($journal as $journals)
                                <tr style="text-align: center">
                                    <td>{{ $journals->trans_date }}</td>
                                    <td>{{ $journals->reference }}</td>
                                    <td>{{ $journals->debit_account }}</td>
                                    <td>@currency($journals->debit)</td>
                                    {{-- <td>{{ $journals->debit }}</td> --}}
                                    <td>@currency('0')</td>
                                </tr>
                                <tr style="text-align: center">
                                    <td>{{ $journals->trans_date }}</td>
                                    <td>{{ $journals->reference }}</td>
                                    <td>{{ $journals->kredit_account }}</td>
                                    <td>@currency('0')</td>
                                    <td>@currency($journals->kredit)</td>
                                    {{-- <td>{{ $journals->kredit }}</td> --}}
                                </tr>
                                {{-- <tr style="text-align: center">
                                    <td colspan="3" style="text-align: center">Total</td>
                                    <td>@currency($debitLedger)</td>
                                    <td>@currency($kreditLedger)</td>
                                </tr> --}}
                            @empty
                                <tr>
                                    <td colspan="7">No records found.</td>
                                </tr>
                            @endforelse
                            <tr style="text-align: center">
                                <td colspan="3" style="text-align: center">Total</td>
                                <td>@currency($debitLedger)</td>
                                <td>@currency($kreditLedger)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection