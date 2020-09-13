<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $akuntansi = User::create([
            'username' => 'akuntansi',
            'email' => 'akuntansi@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $akuntansi->assignRole('akuntansi');


        $keuangan = User::create([
            'username' => 'keuangan',
            'email' => 'keuangan@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $keuangan->assignRole('keuangan');


        $direksi = User::create([
            'username' => 'direksi',
            'email' => 'direksi@gmail.com',
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(60)
        ]);

        $direksi->assignRole('direksi');
    }
}
