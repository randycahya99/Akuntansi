<?php

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = Account::create([
            'account_code' => '100001',
            'account_name' => 'Kas Kecil',
            'saldo_account' => '0',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Kas'
        ]);

        $account = Account::create([
            'account_code' => '100002',
            'account_name' => 'Kas',
            'saldo_account' => '0',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Kas'
        ]);

        $account = Account::create([
            'account_code' => '100003',
            'account_name' => 'Bank',
            'saldo_account' => '0',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Bank'
        ]);

        $account = Account::create([
            'account_code' => '100004',
            'account_name' => 'Piutang Usaha',
            'saldo_account' => '0',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Piutang Usaha'
        ]);

        $account = Account::create([
            'account_code' => '100005',
            'account_name' => 'Deposit Supplier',
            'saldo_account' => '0',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Piutang Usaha'
        ]);

        $account = Account::create([
            'account_code' => '100006',
            'account_name' => 'Piutang Non Usaha',
            'saldo_account' => '0',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Piutang Non Usaha'
        ]);

        $account = Account::create([
            'account_code' => '100007',
            'account_name' => 'Persediaan Barang Dagang',
            'saldo_account' => '0',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Persediaan'
        ]);

        $account = Account::create([
            'account_code' => '100008',
            'account_name' => 'Asuransi Bayar Dimuka',
            'saldo_account' => '0',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Biaya Dibayar Dimuka'
        ]);

        $account = Account::create([
            'account_code' => '100009',
            'account_name' => 'Investasi Saham',
            'saldo_account' => '0',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Investasi Jangka Panjang'
        ]);

        $account = Account::create([
            'account_code' => '100010',
            'account_name' => 'Tanah',
            'saldo_account' => '0',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Harta Tetap Berwujud'
        ]);

        $account = Account::create([
            'account_code' => '100011',
            'account_name' => 'Hutang Usaha',
            'saldo_account' => '0',
            'account_jenis_name' => 'Kewajiban',
            'account_type_name' => 'Hutang Usaha'
        ]);

        $account = Account::create([
            'account_code' => '100012',
            'account_name' => 'Hutang Non Usaha',
            'saldo_account' => '0',
            'account_jenis_name' => 'Kewajiban',
            'account_type_name' => 'Hutang Non Usaha'
        ]);

        $account = Account::create([
            'account_code' => '100013',
            'account_name' => 'Penjualan',
            'saldo_account' => '0',
            'account_jenis_name' => 'Pendapatan',
            'account_type_name' => 'Pendapatan Usaha'
        ]);

        $account = Account::create([
            'account_code' => '100014',
            'account_name' => 'Retur Penjualan',
            'saldo_account' => '0',
            'account_jenis_name' => 'Pendapatan',
            'account_type_name' => 'Pendapatan Usaha'
        ]);

        $account = Account::create([
            'account_code' => '100015',
            'account_name' => 'Harga Pokok Penjualan',
            'saldo_account' => '0',
            'account_jenis_name' => 'Biaya Atas Pendapatan',
            'account_type_name' => 'Biaya Produksi'
        ]);

        $account = Account::create([
            'account_code' => '100016',
            'account_name' => 'Gaji Direksi dan Karyawan',
            'saldo_account' => '0',
            'account_jenis_name' => 'Pengeluaran Operasional',
            'account_type_name' => 'Biaya Operasional'
        ]);

        $account = Account::create([
            'account_code' => '100017',
            'account_name' => 'Listrik, Air dan Telepon',
            'saldo_account' => '0',
            'account_jenis_name' => 'Pengeluaran Operasional',
            'account_type_name' => 'Biaya Operasional'
        ]);

        $account = Account::create([
            'account_code' => '100018',
            'account_name' => 'Biaya Bunga',
            'saldo_account' => '0',
            'account_jenis_name' => 'Pengeluaran Lainnya',
            'account_type_name' => 'Pengeluaran Luar Usaha'
        ]);

        $account = Account::create([
            'account_code' => '100019',
            'account_name' => 'Jasa Bank',
            'saldo_account' => '0',
            'account_jenis_name' => 'Pengeluaran Lainnya',
            'account_type_name' => 'Pengeluaran Luar Usaha'
        ]);
    }
}
