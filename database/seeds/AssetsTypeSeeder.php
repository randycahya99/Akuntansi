<?php

use Illuminate\Database\Seeder;
use App\Models\AssetsType;

class AssetsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assetType = AssetsType::create([
            'asset_type_name' => 'Tanah',
            'asset_group_name' => 'Harta Tetap Berwujud',
            'qty' => '1',
            'description' => '200 bata'
        ]);

        $assetType = AssetsType::create([
            'asset_type_name' => 'Bangunan',
            'asset_group_name' => 'Harta Tetap Berwujud',
            'qty' => '1',
            'description' => '4 tingkat'
        ]);
    }
}
