<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'akuntansi',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'keuangan',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'direksi',
            'guard_name' => 'web'
        ]);
    }
}
