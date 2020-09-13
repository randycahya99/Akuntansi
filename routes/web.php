<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'LoginController@index')->middleware('guest')->name('login');
Route::post('/postLogin', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin'],
    function () {
        Route::get('dashboard', 'DashboardController@index')->middleware('auth');

        // Akun
        Route::get('account', 'AccountController@index')->middleware('auth','checkRole:akuntansi');
        Route::post('addAccount', 'AccountController@store')->middleware('auth','checkRole:akuntansi');
        Route::post('{id}/updateAccount', 'AccountController@update')->middleware('auth','checkRole:akuntansi');
        Route::get('{id}/deleteAccount', 'AccountController@destroy')->middleware('auth','checkRole:akuntansi');

        // Klasifikasi Akun
        Route::get('accountType', 'AccountTypeController@index')->middleware('auth','checkRole:akuntansi');
        Route::post('addType', 'AccountTypeController@store')->middleware('auth','checkRole:akuntansi');
        Route::post('{id}/updateType', 'AccountTypeController@update')->middleware('auth','checkRole:akuntansi');
        Route::get('{id}/deleteType', 'AccountTypeController@destroy')->middleware('auth','checkRole:akuntansi');

        // Jenis Akun
        Route::get('accountJenis', 'AccountJenisController@index')->middleware('auth','checkRole:akuntansi');
        Route::post('addJenis', 'AccountJenisController@store')->middleware('auth','checkRole:akuntansi');
        Route::post('{id}/updateJenis', 'AccountJenisController@update')->middleware('auth','checkRole:akuntansi');
        Route::get('{id}/deleteJenis', 'AccountJenisController@destroy')->middleware('auth','checkRole:akuntansi');

        // Jenis Harta
        Route::get('assetGroup', 'AssetsGroupController@index')->middleware('auth','checkRole:akuntansi');
        Route::post('addAssetGroup', 'AssetsGroupController@store')->middleware('auth','checkRole:akuntansi');
        Route::post('{id}/updateAssetGroup', 'AssetsGroupController@update')->middleware('auth','checkRole:akuntansi');
        Route::get('{id}/deleteAssetGroup', 'AssetsGroupController@destroy')->middleware('auth','checkRole:akuntansi');

        // Klasifikasi Harta
        Route::get('assetType', 'AssetsTypeController@index')->middleware('auth','checkRole:akuntansi');
        Route::post('addAssetType', 'AssetsTypeController@store')->middleware('auth','checkRole:akuntansi');
        Route::post('{id}/updateAssetType', 'AssetsTypeController@update')->middleware('auth','checkRole:akuntansi');
        Route::get('{id}/deleteAssetType', 'AssetsTypeController@destroy')->middleware('auth','checkRole:akuntansi');

        // Kas
        Route::get('incomeCash', 'CashController@showIncomeCash')->middleware('auth','checkRole:akuntansi');
        Route::get('expenseCash', 'CashController@showExpenseCash')->middleware('auth','checkRole:akuntansi');
        Route::post('addCash', 'CashController@store')->middleware('auth','checkRole:akuntansi');
        Route::post('{id}/updateIncomeCash', 'CashController@update')->middleware('auth','checkRole:akuntansi');
        Route::post('{id}/updateExpenseCash', 'CashController@update')->middleware('auth','checkRole:akuntansi');
        Route::get('{id}/deleteIncomeCash', 'CashController@destroy')->middleware('auth','checkRole:akuntansi');
        Route::get('{id}/deleteExpenseCash', 'CashController@destroy')->middleware('auth','checkRole:akuntansi');
        Route::post('{id}/postingCash', 'CashController@posting')->middleware('auth','checkRole:akuntansi');

        // Pajak
        Route::get('tax', 'TaxController@index')->middleware('auth','checkRole:akuntansi');
        Route::post('addTax', 'TaxController@store')->middleware('auth','checkRole:akuntansi');
        Route::post('{id}/updateTax', 'TaxController@update')->middleware('auth','checkRole:akuntansi');
        Route::get('{id}/deleteTax', 'TaxController@destroy')->middleware('auth','checkRole:akuntansi');

        // Jurnal Umum
        Route::get('journal', 'JournalController@index')->middleware('auth','checkRole:akuntansi');
        Route::post('addJournal', 'JournalController@store')->middleware('auth','checkRole:akuntansi');
        Route::post('{id}/updateJournal', 'JournalController@update')->middleware('auth','checkRole:akuntansi');
        Route::get('{id}/deleteJournal', 'JournalController@destroy')->middleware('auth','checkRole:akuntansi');
        Route::get('{id}/postingToLedger', 'JournalController@posting')->middleware('auth','checkRole:akuntansi');

        // Buku Besar
        Route::get('ledger', 'LedgerController@index')->middleware('auth','checkRole:akuntansi');

        // Transaksi
        Route::get('transactions', 'TransactionsController@showTransactions')->middleware('auth');
        Route::post('addTransactions', 'TransactionsController@store')->middleware('auth','checkRole:keuangan');
        Route::post('{id}/updateTransactions', 'TransactionsController@update')->middleware('auth','checkRole:keuangan');
        Route::get('{id}/deleteTransactions', 'TransactionsController@destroy')->middleware('auth','checkRole:keuangan');
        Route::post('{id}/postingToJournal', 'TransactionsController@posting')->middleware('auth','checkRole:akuntansi');

        // Laporan
        Route::get('laporanArusKas', 'LaporansController@viewArusKas')->middleware('auth');
        Route::get('cetakArusKas', 'LaporansController@cetakArusKas')->middleware('auth');
        Route::get('laporanNeraca', 'LaporansController@viewNeraca')->middleware('auth');
        Route::get('cetakNeraca', 'LaporansController@cetakNeraca')->middleware('auth');
        Route::get('laporanLabaRugi', 'LaporansController@viewLabaRugi')->middleware('auth');
        Route::get('cetakLabaRugi', 'LaporansController@cetakLabaRugi')->middleware('auth');
    }
);
