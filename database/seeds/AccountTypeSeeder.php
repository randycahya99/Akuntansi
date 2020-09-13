<?php

use Illuminate\Database\Seeder;
use App\Models\AccountType;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accountType = AccountType::create([
            'type_code' => '10001',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Kas'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10002',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Bank'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10003',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Piutang Usaha'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10004',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Piutang Non Usaha'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10005',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Piutang Pajak'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10006',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Persediaan'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10007',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Biaya Dibayar Dimuka'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10008',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Investasi Jangka Panjang'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10009',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Harta Tetap Berwujud'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10010',
            'account_jenis_name' => 'Harta',
            'account_type_name' => 'Harta Tetap Tidak Berwujud'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10011',
            'account_jenis_name' => 'Kewajiban',
            'account_type_name' => 'Hutang Usaha'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10012',
            'account_jenis_name' => 'Kewajiban',
            'account_type_name' => 'Hutang Non Usaha'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10013',
            'account_jenis_name' => 'Pendapatan',
            'account_type_name' => 'Pendapatan Usaha'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10014',
            'account_jenis_name' => 'Pendapatan',
            'account_type_name' => 'Pendapatan Penjualan'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10015',
            'account_jenis_name' => 'Biaya Atas Pendapatan',
            'account_type_name' => 'Biaya Produksi'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10016',
            'account_jenis_name' => 'Pengeluaran Operasional',
            'account_type_name' => 'Biaya Operasional'
        ]);

        $accountType = AccountType::create([
            'type_code' => '10017',
            'account_jenis_name' => 'Pengeluaran Lainnya',
            'account_type_name' => 'Pengeluaran Luar Usaha'
        ]);
    }
}
