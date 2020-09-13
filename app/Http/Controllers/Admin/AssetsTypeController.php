<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssetsType;
use App\Models\AssetsGroup;

class AssetsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['assetType'] = AssetsType::all();

        $asset_jenis = AssetsGroup::select('id','asset_group_name')->get();

        return view('admin.assetType', $this->data)->with('asset_jenis', $asset_jenis);
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
            'asset_type_name' => 'required|unique:asset_type',
            'asset_group_name' => 'required',
            'qty' => 'required',
            'description' => 'required',
        ]);

        AssetsType::create($request->all());

        return redirect('/admin/assetType')->with('success','Data berhasil ditambahkan.');
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
            'asset_type_name' => 'required',
            'asset_group_name' => 'required',
            'qty' => 'required',
            'description' => 'required',
        ]);
        
        $assetType = AssetsType::find($id);
        $assetType->update($request->all());

        return redirect('admin/assetType')->with('success','Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assetType = AssetsType::find($id);
        $assetType->delete($assetType);

        return redirect('admin/assetType')->with('success','Data berhasil dihapus.');
    }
}
