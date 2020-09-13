<?php

use Illuminate\Database\Seeder;
use App\Models\AccountJenis;

class AccountJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accountJenis = AccountJenis::create([
            'jenis_code' => '1001',
            'account_jenis_name' => 'Harta'
        ]);

        $accountJenis = AccountJenis::create([
            'jenis_code' => '1002',
            'account_jenis_name' => 'Kewajiban'
        ]);

        $accountJenis = AccountJenis::create([
            'jenis_code' => '1003',
            'account_jenis_name' => 'Modal'
        ]);

        $accountJenis = AccountJenis::create([
            'jenis_code' => '1004',
            'account_jenis_name' => 'Pendapatan'
        ]);

        $accountJenis = AccountJenis::create([
            'jenis_code' => '1005',
            'account_jenis_name' => 'Pendapatan Lain'
        ]);

        $accountJenis = AccountJenis::create([
            'jenis_code' => '1006',
            'account_jenis_name' => 'Biaya Atas Pendapatan'
        ]);

        $accountJenis = AccountJenis::create([
            'jenis_code' => '1007',
            'account_jenis_name' => 'Pengeluaran Operasional'
        ]);

        $accountJenis = AccountJenis::create([
            'jenis_code' => '1008',
            'account_jenis_name' => 'Pengeluaran Lainnya'
        ]);
    }
}
