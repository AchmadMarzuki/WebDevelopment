<?php

namespace App\Notifications\notifvalkajur;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notifvalkajur extends Mailable {
    use Queueable, SerializesModels;

    public $nama;
    public $nama_sekolah;
    
    public function __construct($nama, $nama_sekolah){
        $this->nama = $nama;
        $this->nama_sekolah = $nama_sekolah;
    }
 
    public function build()
    {
        return $this->subject('SIPPL')->from('sippl@mail.ub.ac.id', 'PTI')->view('Notifications.NotifValKajur.notifvalkajur');
    }
}
