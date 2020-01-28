<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;

class SMK extends Model {
    protected $table = 'SMK';
    protected $fillable = ['user_id', 'nama_sekolah', 'email', 'waktu_mulai', 'waktu_berakhir', 'alamat','deskripsi', 'kuota', 'gambar'];
      
}
