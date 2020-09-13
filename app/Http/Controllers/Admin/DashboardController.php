<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Account;
use App\Models\Cash;
use App\Models\Transactions;

class DashboardController extends Controller
{
    function index()
    {
        return view('admin.dashboard', [
            'account' => Account::count(),
            'incomeCash' => Cash::where('cash_type','Kas Masuk')->sum('total'),
            'expenseCash' => Cash::where('cash_type','Kas Keluar')->sum('total'),
            'transactions' => Transactions::sum('debit'),
        ]);
    }
}
