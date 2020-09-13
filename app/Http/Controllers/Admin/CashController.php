<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cash;
use App\Models\Account;
use App\Models\Journals;
use PDF;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showIncomeCash()
    {
        $this->data['cash'] = Cash::where('cash_type','Kas Masuk')->OrderBy('id','ASC')->paginate(10);

        $account = Account::select('id','account_code','account_name','account_type_name')->where('account_type_name','Kas')->get();

        $akuns = Account::select('id','account_code','account_name')->get();

        return view('admin.incomeCash', $this->data)->with('account', $account)->with('akuns', $akuns);
    }


    public function showExpenseCash()
    {
        $this->data['cash'] = Cash::where('cash_type','Kas Keluar')->OrderBy('id','ASC')->paginate(10);

        $account = Account::select('id','account_code','account_name','account_type_name')->where('account_type_name','Kas')->get();

        $akuns = Account::select('id','account_code','account_name')->get();

        return view('admin.expenseCash', $this->data)->with('account', $account)->with('akuns', $akuns);
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
            'cash_type' => 'required',
            'date' => 'required',
            'reference' => 'required|unique:cash|min:6|max:6',
            'account_name' => 'required',
            'name' => 'required',
            'description' => 'required',
            'total' => 'required|numeric',
        ]);

        Cash::create($request->all());

        if ($request->cash_type == 'Kas Masuk') {
            return redirect('/admin/incomeCash')->with('success','Data berhasil ditambahkan.');
        } else {
            return redirect('/admin/expenseCash')->with('success','Data berhasil ditambahkan');
        }
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
            'date' => 'required',
            'reference' => 'required|min:6|max:6',
            'account_name' => 'required',
            'name' => 'required',
            'description' => 'required',
            'total' => 'required|numeric',
        ]);
        
        $cash = Cash::find($id);
        $cash->update($request->all());

        if ($cash->cash_type == 'Kas Masuk') {
            return redirect('/admin/incomeCash')->with('success','Data berhasil diperbarui.');
        } else {
            return redirect('/admin/expenseCash')->with('success','Data berhasil diperbarui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cash = Cash::find($id);
        $cash->delete($cash);

        if ($cash->cash_type == 'Kas Masuk') {
            return redirect('/admin/incomeCash')->with('success','Data berhasil dihapus.');
        } else {
            return redirect('/admin/expenseCash')->with('success','Data berhasil dihapus.');
        }
    }


    public function pdf()
    {
        // $data['judul'] = "Laporan Arus Kas";
        // $pdf = PDF::loadView('admin.laporanArusKas', $data);
        
        // return $pdf->download('ArusKas.pdf');

        // return view('admin.laporanArusKas');
    }

    public function posting(Request $request, $id)
    {
        $cash = Cash::find($id);
        $cash->posting = 'yes';
        $cash->save();

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

        if ($cash->cash_type == 'Kas Masuk') {
            return redirect('/admin/incomeCash')->with('success','Data berhasil diposting.');
        } else {
            return redirect('/admin/expenseCash')->with('success','Data berhasil diposting.');
        }
    }
}
