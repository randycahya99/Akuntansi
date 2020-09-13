@extends('admin.layout')

@section('content')


{{-- <div class="content">
    <h3>Welcome to Dashboard Admin</h3>
</div> --}}
<div class="content">
    <div class="row">
        @if (auth()->user()->username == 'akuntansi')
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i style="color:#fbc962 "class="mdi mdi-folder-multiple-outline"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Akun</p>
                                <p class="card-title">{{$account}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-clock-o"></i> Data saat ini                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="mdi mdi-bank " style='color:#7cd6a4'></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Kas Masuk</p>
                                <p class="card-title">@currency($incomeCash)
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-clock-o"></i> Data saat ini                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i style="color:#f29b79 " class="mdi mdi-bank"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Kas Keluar</p>
                                <p class="card-title">@currency($expenseCash)
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> Data saat ini
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if (auth()->user()->username == 'akuntansi' || auth()->user()->username == 'keuangan')
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i style="color:#81d9dc " class="fa fa-dollar"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Total Transaksi</p>
                                <p class="card-title">@currency($transactions)
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-clock-o"></i> Data saat ini                        </div>
                </div>
            </div>
        </div>
        @endif
        @if (auth()->user()->username == 'direksi')
        <h3>Selamat Datang di Dashboard Admin</h3>
        @endif
    </div>
</div>

@stop