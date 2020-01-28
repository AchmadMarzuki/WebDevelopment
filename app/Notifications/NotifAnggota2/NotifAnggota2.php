<?php

namespace App\Notifications\NotifAnggota2;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifAnggota2 extends Mailable {
    use Queueable, SerializesModels;

    public $namaketua;
    public $namaAnggota;
    
    public function __construct($NamaKetuaTim, $namaAnggota2){
        $this->namaketua = $NamaKetuaTim;
        $this->namaAnggota = $namaAnggota2;
    }
 
    public function build()
    {
        return $this->subject('SIPPL')->from('sippl@mail.ub.ac.id', 'PTI')->view('Notifications.NotifAnggota2.NotifAnggota2');
    }
}
