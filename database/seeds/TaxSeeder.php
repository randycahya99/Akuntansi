<?php

use Illuminate\Database\Seeder;
use App\Models\Tax;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tax = Tax::create([
            'tax_code' => 'PPh',
            'tax_name' => 'Pajak Penghasilan',
            'rate' => '5'
        ]);

        $tax = Tax::create([
            'tax_code' => 'PBB',
            'tax_name' => 'Pajak Bumi dan Bangunan',
            'rate' => '20'
        ]);

        $tax = Tax::create([
            'tax_code' => 'PPN',
            'tax_name' => 'Pajak Pertambahan Nilai',
            'rate' => '10'
        ]);
    }
}
