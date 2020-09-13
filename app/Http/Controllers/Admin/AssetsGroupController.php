<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssetsGroup;
use App\Models\Account;

class AssetsGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['assetGroup'] = AssetsGroup::all();

        $account = Account::select('id','account_code','account_name','account_type_name','account_jenis_name')->where('account_jenis_name','Harta')->get();

        return view('admin.assetGroup', $this->data)->with('account', $account);
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
            'asset_group_name' => 'required|unique:asset_group',
            'description' => 'required',
        ]);

        AssetsGroup::create($request->all());

        return redirect('/admin/assetGroup')->with('success','Data berhasil ditambahkan.');
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
            'asset_group_name' => 'required',
            'description' => 'required',
        ]);
        
        $assetGroup = AssetsGroup::find($id);
        $assetGroup->update($request->all());

        return redirect('admin/assetGroup')->with('success','Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assetGroup = AssetsGroup::find($id);
        $assetGroup->delete($assetGroup);

        return redirect('admin/assetGroup')->with('success','Data berhasil dihapus.');
    }
}
