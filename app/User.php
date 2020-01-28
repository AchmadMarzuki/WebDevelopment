<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use Notifiable;
 
    protected $fillable = ['nim','nama', 'email', 'password', 'gambar', 'level','token','is_verified'];

    protected $hidden = ['password', 'remember_token'];

}
 