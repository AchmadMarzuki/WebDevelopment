<?php

use Illuminate\Database\Seeder;

class InformasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Informasi::insert([
            [
              'id'  			=> 1,
              'informasi_id' => 1,
              'nama_sekolah'  			=> 'SMA 1 Malang',
              'nis'			=> '9920392749',
              'alamat' 		=> 'no. 23 Soekarno hatta Malang',
              'deskripsi'		=> 'SMA 1 Malang deskripsi',
              'kuota'		=> 5,
              'gambar'			=> 'buku_java.jpg',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  => 2,
              'informasi_id' => 2,
              'nama_sekolah'  => 'SMA 2 Malang',
              'nis'			=> '1020392744',
              'alamat' 		=> 'no. 23 Dinoyo Malang',
              'deskripsi'		=> 'SMA 2 Malang deskripsi',
              'kuota'		=> 5,
              'gambar'			=> 'buku_java.jpg',
              'created_at'  => \Carbon\Carbon::now(),
              'updated_at'  => \Carbon\Carbon::now()
            ],
            
 
        ]);
    }
}
