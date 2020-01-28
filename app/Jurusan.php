<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model {
    public $timestamps = false;
	protected $table = 'Jurusan';
    protected $fillable = ['nama_jurusan'];

 
}
