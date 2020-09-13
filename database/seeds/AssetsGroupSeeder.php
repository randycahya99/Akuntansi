<?php

use Illuminate\Database\Seeder;
use App\Models\AssetsGroup;

class AssetsGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assetGroup = AssetsGroup::create([
            'asset_group_name' => 'Harta Tetap Berwujud',
            'description' => 'Terlihat Jelas'
        ]);

        $assetGroup = AssetsGroup::create([
            'asset_group_name' => 'Harta Tetap Tidak Berwujud',
            'description' => 'Tidak Nampak'
        ]);

        $assetGroup = AssetsGroup::create([
            'asset_group_name' => 'Harta Sementara',
            'description' => 'Tidak Permanen'
        ]);
    }
}
