<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPPL extends Model {
    protected $table = 'PendaftaranPPL';
    protected $fillable = ['kode_daftar','smk_id','dosbing_id', 'mahasiswa_id','validasiSMK','validasiKajur', 'validasiKaprodi'];
  } 

