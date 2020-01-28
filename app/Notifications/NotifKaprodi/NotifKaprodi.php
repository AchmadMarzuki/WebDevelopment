<?php

namespace App\Notifications\NotifKaprodi;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifKaprodi extends Mailable {
    use Queueable, SerializesModels;

    public $PendaftaranPPL;
    public $kode_daftar;
    public $jumlah;
    public $jumlahdata;
 
    
    public function __construct($PendaftaranPPL, $kode_daftar, $jumlah, $jumlahdata){
        $this->PendaftaranPPL = $PendaftaranPPL;
        $this->kode_daftar = $kode_daftar;
        $this->jumlah = $jumlah;
        $this->jumlahdata = $jumlahdata;
 
    }
 
    public function build()
    {
        return $this->subject('SIPPL')->from('sippl@mail.ub.ac.id', 'PTI')->view('Notifications.NotifKaprodi.NotifKaprodi');
    }
}
