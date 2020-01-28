<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PendaftaranPPL;
use App\User;
use App\Mahasiswa;
use App\SMK;
use App\Dosbing;
use Auth;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
 
    public function index() {
 
        $mahasiswa = Mahasiswa::get();
        $PendaftaranPPL = PendaftaranPPL::get();
        $SMK = SMK::get();
        $dosbing = Dosbing::get();
        $users = User::get();

        return view('home', compact('mahasiswa','PendaftaranPPL','SMK', 'dosbing', 'users'));    
    }
}