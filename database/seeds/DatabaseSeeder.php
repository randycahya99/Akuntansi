<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AccountJenisSeeder::class);
        $this->call(AccountTypeSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(AssetsGroupSeeder::class);
        $this->call(AssetsTypeSeeder::class);
        $this->call(TaxSeeder::class);
    }
}
