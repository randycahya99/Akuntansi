<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AccountJenis;

class AccountJenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['accountJenis'] = AccountJenis::all();

        return view('admin.accountJenis', $this->data);
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
            'jenis_code' => 'required|unique:account_jenis|min:4|max:4',
            'account_jenis_name' => 'required|unique:account_jenis',
        ]);

        AccountJenis::create($request->all());

        return redirect('/admin/accountJenis')->with('success', 'Data berhasil ditambahkan.');
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
            'jenis_code' => 'required|min:4|max:4',
            'account_jenis_name' => 'required',
        ]);

        $accountJenis = AccountJenis::find($id);
        $accountJenis->update($request->all());

        return redirect('admin/accountJenis')->with('success','Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accountJenis = AccountJenis::find($id);
        $accountJenis->delete($accountJenis);

        return redirect('admin/accountJenis')->with('success','Data berhasil dihapus.');
    }
}
