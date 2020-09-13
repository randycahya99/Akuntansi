<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Account;
use App\Models\AccountJenis;
use App\Models\AccountType;
use App\Models\AssetsGroup;
use App\Models\AssetsType;
use App\Models\Cash;
use App\Models\Journals;
use App\Models\Tax;
use App\Models\Transactions;

use PDF;

class LaporansController extends Controller
{
    public function viewArusKas()
    {
        $incomeCash = Cash::where('posting','yes')->where('cash_type','Kas Masuk')->sum('total');
        $expenseCash = Cash::where('posting','yes')->where('cash_type','Kas Keluar')->sum('total');        
        $totalCash = $incomeCash - $expenseCash;
        // dd($totalCash);

        return view('admin.laporanArusKas', [
            'cash' => Cash::all()->where('posting','yes'),
            'totalCash' => $totalCash,
        ]);
    }

    public function cetakArusKas()
    {
        $incomeCash = Cash::where('posting','yes')->where('cash_type','Kas Masuk')->sum('total');
        $expenseCash = Cash::where('posting','yes')->where('cash_type','Kas Keluar')->sum('total');        
        $totalCash = $incomeCash - $expenseCash;
        $cash = Cash::all()->where('posting','yes');

        $pdf = PDF::loadView('admin.cetakArusKas', [
            'cash' => $cash,
            'totalCash' => $totalCash,
        ]);
        
        return $pdf->download('ArusKas.pdf');
        // return view('admin.cetakArusKas', [
        //     'cash' => $cash,
        //     'totalCash' => $totalCash,
        // ]);
    }

    public function viewNeraca()
    {
        $asset = Journals::select()->where('posting', 'yes')->whereNotNull('debit')->get();
        $liabilities = Journals::select()->where('posting', 'yes')->whereNotNull('kredit')->get();
        // dd($liabilities);

        foreach ($asset as $harta)
        {
            $totalHarta = $harta->where('posting','yes')->sum('debit');
            // dd($totalHarta);
        }

        foreach ($liabilities as $kewajiban)
        {
            $totalKewajiban = $kewajiban->where('posting','yes')->sum('kredit');
            // dd($totalKewajiban);
        }

        return view('admin.laporanNeraca', [
            'asset' => $asset,
            'liabilities' => $liabilities,
            'totalHarta' => $totalHarta,
            'totalKewajiban' => $totalKewajiban,
        ]);
    }

    public function cetakNeraca()
    {
        $asset = Journals::select()->where('posting', 'yes')->whereNotNull('debit')->get();
        $liabilities = Journals::select()->where('posting', 'yes')->whereNotNull('kredit')->get();
        // dd($liabilities);

        foreach ($asset as $harta)
        {
            $totalHarta = $harta->where('posting','yes')->sum('debit');
            // dd($totalHarta);
        }

        foreach ($liabilities as $kewajiban)
        {
            $totalKewajiban = $kewajiban->where('posting','yes')->sum('kredit');
            // dd($totalKewajiban);
        }

        $pdf = PDF::loadView('admin.cetakNeraca', [
            'asset' => $asset,
            'liabilities' => $liabilities,
            'totalHarta' => $totalHarta,
            'totalKewajiban' => $totalKewajiban,
        ]);

        return $pdf->download('Neraca.pdf');

        // return view('admin.cetakNeraca', [
        //     'asset' => $asset,
        //     'liabilities' => $liabilities,
        //     'totalHarta' => $totalHarta,
        //     'totalKewajiban' => $totalKewajiban,
        // ]);
    }

    public function viewLabaRugi()
    {
        $pendapatan = Account::where('account_jenis_name','Pendapatan')->orWhere('account_jenis_name','Pendapatan Lain')->get();
        $pengeluaran = Account::where('account_jenis_name','Biaya Atas Pendapatan')->orWhere('account_jenis_name','Pengeluaran Operasional','Pengeluaran Lainnya')->get();
        // dd($pengeluaran);

        foreach ($pendapatan as $pendapatans) {
            $totalPendapatan = $pendapatans->where('account_jenis_name','Pendapatan')->orWhere('account_jenis_name','Pendapatan Lain')->sum('saldo_account');
        }

        foreach ($pengeluaran as $pengeluarans) {
            $totalPengeluaran = $pengeluarans->where('account_jenis_name','Biaya Atas Pendapatan')->orWhere('account_jenis_name','Pengeluaran Operasional','Pengeluaran Lainnya')->sum('saldo_account');
        }

        $LabaRugi = $totalPendapatan - $totalPengeluaran;

        // dd($LabaRugi);

        return view('admin.laporanLabaRugi', [
            'pendapatan' => $pendapatan,
            'pengeluaran' => $pengeluaran,
            'totalPendapatan' => $totalPendapatan,
            'totalPengeluaran' => $totalPengeluaran,
            'LabaRugi' => $LabaRugi,
        ]);
    }

    public function cetakLabaRugi()
    {
        $pendapatan = Account::where('account_jenis_name','Pendapatan')->orWhere('account_jenis_name','Pendapatan Lain')->get();
        $pengeluaran = Account::where('account_jenis_name','Biaya Atas Pendapatan')->orWhere('account_jenis_name','Pengeluaran Operasional','Pengeluaran Lainnya')->get();
        // dd($pengeluaran);

        foreach ($pendapatan as $pendapatans) {
            $totalPendapatan = $pendapatans->where('account_jenis_name','Pendapatan')->orWhere('account_jenis_name','Pendapatan Lain')->sum('saldo_account');
        }

        foreach ($pengeluaran as $pengeluarans) {
            $totalPengeluaran = $pengeluarans->where('account_jenis_name','Biaya Atas Pendapatan')->orWhere('account_jenis_name','Pengeluaran Operasional','Pengeluaran Lainnya')->sum('saldo_account');
        }

        $LabaRugi = $totalPendapatan - $totalPengeluaran;

        // dd($LabaRugi);

        $pdf = PDF::loadView('admin.cetakLabaRugi', [
            'pendapatan' => $pendapatan,
            'pengeluaran' => $pengeluaran,
            'totalPendapatan' => $totalPendapatan,
            'totalPengeluaran' => $totalPengeluaran,
            'LabaRugi' => $LabaRugi,
        ]);

        return $pdf->download('LabaRugi.pdf');

        // return view('admin.cetakLabaRugi', [
        //     'pendapatan' => $pendapatan,
        //     'pengeluaran' => $pengeluaran,
        //     'totalPendapatan' => $totalPendapatan,
        //     'totalPengeluaran' => $totalPengeluaran,
        //     'LabaRugi' => $LabaRugi,
        // ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
