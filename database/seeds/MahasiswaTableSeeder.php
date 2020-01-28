<?php

use Illuminate\Database\Seeder;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Mahasiswa::insert([
            [
              'id'  			=> 1,
              'nama' 			=> 'Rico',
              'mahasiswa_id'  		=> 1,
              'nim'				=> 10000353,
              'email'	=> 'rico@mail.com',
               'prodi'			=> 'TI',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'  			=> 2,
                'nama' 			=> 'Rini',
                'mahasiswa_id'  		=> 2,
                'nim'				=> 10000000,
                'email'	=> 'rini@mail.com',
                 'prodi'			=> 'TI',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}