<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;

class Dosbing extends Model {
    protected $table = 'dosbing';
    protected $fillable = ['nama_dosbing', 'nip','ahli_bidang'];
    public $timestamps = true;
}
