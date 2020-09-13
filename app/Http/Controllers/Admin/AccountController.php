<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Account;
use App\Models\AccountJenis;
use App\Models\AccountType;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['account'] = Account::all();

        $account_jenis = AccountJenis::select('id','jenis_code','account_jenis_name')->get();

        $account_type = AccountType::select('id','type_code','account_type_name')->get();

        return view('admin.account', $this->data)->with('account_jenis', $account_jenis)->with('account_type', $account_type);
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
            'account_code' => 'required|unique:account_master|min:6|max:6',
            'account_name' => 'required|unique:account_master',
            'saldo_account' => 'required|numeric',
            'account_jenis_name' => 'required',
            'account_type_name' => 'required',
        ]);

        Account::create($request->all());

        return redirect('admin/account')->with('success', 'Data berhasil ditambahkan.');
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
            'account_code' => 'required|min:6|max:6',
            'account_name' => 'required',
            'saldo_account' => 'required|numeric',
            'account_jenis_name' => 'required',
            'account_type_name' => 'required',
        ]);
        
        $account = Account::find($id);
        $account->update($request->all());

        return redirect('admin/account')->with('success','Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::find($id);
        $account->delete($account);

        return redirect('admin/account')->with('success','Data berhasil dihapus.');
    }
}
