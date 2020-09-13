<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Journals;
use App\Models\Account;

use PDF;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['journal'] = Journals::all();

        $account = Account::select('id','account_code','account_name')->get();

        return view('admin.journal', $this->data)->with('account', $account);
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
        $request->validate([
            'trans_date' => 'required',
            'reference' => 'required|unique:journal|min:6|max:6',
            'description' => 'required',
            'debit_account' => 'required',
            'kredit_account' => 'required',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric|same:debit',
        ]);

        Journals::create($request->all());

        return redirect('/admin/journal')->with('success','Data berhasil ditambahkan.');
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
        $request->validate([
            'trans_date' => 'required',
            'reference' => 'required|min:6|max:6',
            'description' => 'required',
            'debit_account' => 'required',
            'kredit_account' => 'required',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric',
        ]);
        
        $journal = Journals::find($id);
        $journal->update($request->all());

        return redirect('/admin/journal')->with('success','Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $journal = Journals::find($id);
        $journal->delete($journal);

        return redirect('/admin/journal')->with('success','Data berhasil dihapus.');
    }



    public function posting(Request $request, $id){
        $journal = Journals::find($id);
        $journal->posting = 'yes';
        $journal->save();

        $debitAccount = Account::select()->where('account_name', $journal->debit_account)->get();
        $kreditAccount = Account::where('account_name', $journal->kredit_account)->get();
        
        // $debitAccount['saldo_account'] = $debitAccount['saldo_account'] + $journal->debit;
        // $kreditAccount['saldo_account'] = $debitAccount['saldo_account'] - $journal->kredit;
        
        foreach ($debitAccount as $debit)
        {
            $debit->saldo_account = $debit->saldo_account + $journal->debit;
            $debit->save();

            // dd($debit->saldo_account);    
        }

        foreach ($kreditAccount as $kredit)
        {
            $kredit->saldo_account = $kredit->saldo_account - $journal->kredit;
            $kredit->save();

            // dd($kredit->saldo_account);
        }
        
        // $saldo = $debitAccount->saldo_account;
        // dd($saldo);

        return redirect('/admin/journal')->with('success','Data berhasil diposting ke buku besar.');
    }
}
