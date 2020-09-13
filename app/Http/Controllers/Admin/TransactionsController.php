<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Transactions;
use App\Models\Journals;
use App\Models\Account;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTransactions()
    {
        $this->data['transactions'] = Transactions::all();

        $account = Account::select('id','account_code','account_name')->get();

        return view('admin.transactions', $this->data)->with('account', $account);
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
            'reference' => 'required',
            'description' => 'required',
            'debit' => 'required|numeric',
        ]);

        Transactions::create($request->all());

        return redirect('/admin/transactions')->with('success','Data berhasil ditambahkan.');
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
            'reference' => 'required',
            'description' => 'required',
            'debit' => 'required|numeric',
        ]);
        
        $transactions = Transactions::find($id);
        $transactions->update($request->all());

        return redirect('/admin/transactions')->with('success','Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transactions = Transactions::find($id);
        $transactions->delete($transactions);

        return redirect('/admin/transactions')->with('success','Data berhasil dihapus.');
    }

    
    public function posting(Request $request, $id)
    {
        $request->validate([
            'trans_date' => 'required',
            'reference' => 'required',
            'description' => 'required',
            'debit_account' => 'required',
            'kredit_account' => 'required',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric',
        ]);

        Journals::create($request->all());
        
        $transactions = Transactions::find($id);
        $transactions->posting = 'yes';
        $transactions->save();

        
        return redirect('/admin/transactions')->with('success','Data berhasil di posting ke Jurnal Umum');
    }
}
