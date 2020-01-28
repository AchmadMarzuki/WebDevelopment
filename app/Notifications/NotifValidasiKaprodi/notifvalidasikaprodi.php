<?php

namespace App\Notifications\notifvalidasikaprodi;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notifvalidasikaprodi extends Mailable {
    use Queueable, SerializesModels;

    public $nama;
    
    public function __construct($nama){
        $this->nama = $nama;
    }
 
    public function build()
    {
        return $this->subject('SIPPL')->from('kaprodi@mail.ub.ac.id', 'PTI')->view('Notifications.NotifValidasiKaprodi.notifvalidasikaprodi');
    }
}
