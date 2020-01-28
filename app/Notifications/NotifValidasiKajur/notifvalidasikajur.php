<?php

namespace App\Notifications\notifvalidasikajur;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notifvalidasikajur extends Mailable {
    use Queueable, SerializesModels;

    public $nama;

    
    public function __construct($nama){
        $this->nama = $nama;
    }
 
    public function build()
    {
        return $this->subject('SIPPL')->from('kajur@mail.ub.ac.id', 'PTI')->view('Notifications.NotifValidasiKajur.notifvalidasikajur');
    }
}
