<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
              'id'  			=> 1,
              'name'  			=> 'Administrator',
              'username'		=> 'administrator1',
              'email' 			=> 'admin@mail.com',
              'password'		=> bcrypt('admin123'),
              'gambar'			=> NULL,
              'level'			=> 'admin',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 2,
              'name'  			=> 'Mahasiswa',
              'username'		=> 'Mahasiswa1',
              'email' 			=> 'user@mail.com',
              'password'		=> bcrypt('291991'),
              'gambar'			=> NULL,
              'level'			=> 'user',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'  			=> 3,
                'name'  			=> 'Admin Sekolah',
                'username'		=> 'adminsekolah1',
                'email' 			=> 'adminsekolah@mail.com',
                'password'		=> bcrypt('291991'),
                'gambar'			=> NULL,
                'level'			=> 'AdminSekolah',
                'remember_token'	=> NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ]
        ]);
    }
}
