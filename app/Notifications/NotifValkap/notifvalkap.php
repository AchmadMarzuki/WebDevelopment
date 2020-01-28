<?php

namespace App\Notifications\notifvalkap;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notifvalkap extends Mailable {
    use Queueable, SerializesModels;

    public $nama;
    public $nama_sekolah;
    
    public function __construct($nama, $nama_sekolah){
        $this->nama = $nama;
        $this->nama_sekolah = $nama_sekolah;
    }
 
    public function build()
    {
        return $this->subject('SIPPL')->from('sippl@mail.ub.ac.id', 'PTI')->view('Notifications.NotifValkap.notifvalkap');
    }
}
