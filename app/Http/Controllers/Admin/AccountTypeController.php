<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AccountJenis;
use App\Models\AccountType;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['accountType'] = AccountType::all();

        $account_jenis = AccountJenis::all();

        return view('admin.accountType', $this->data)->with('account_jenis', $account_jenis);
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
            'type_code' => 'required|unique:account_type|min:5|max:5',
            'account_jenis_name' => 'required',
            'account_type_name' => 'required|unique:account_type',
        ]);

        AccountType::create($request->all());

        return redirect('/admin/accountType')->with('success', 'Data berhasil ditambahkan.');
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
            'type_code' => 'required|min:5|max:5',
            'account_jenis_name' => 'required',
            'account_type_name' => 'required',
        ]);
        
        $accountType = AccountType::find($id);
        $accountType->update($request->all());

        return redirect('admin/accountType')->with('success','Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accountType = AccountType::find($id);
        $accountType->delete($accountType);

        return redirect('admin/accountType')->with('success','Data berhasil dihapus.');
    }
}
