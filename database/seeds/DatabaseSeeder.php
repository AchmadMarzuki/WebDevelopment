<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(InformasisTableSeeder::class);
        $this->call(MahasiswasTableSeeder::class);
        $this->call(MendaftarsTableSeeder::class);
    }
}
