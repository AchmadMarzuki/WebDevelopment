<?php

namespace App\Notifications\NotifAnggota3;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifAnggota3 extends Mailable {
    use Queueable, SerializesModels;

    public $namaketua;
    public $namaAnggota;
    
    public function __construct($NamaKetuaTim, $namaAnggota3){
        $this->namaketua = $NamaKetuaTim;
        $this->namaAnggota = $namaAnggota3;
    }
 
    public function build()
    {
        return $this->subject('SIPPL')->from('sippl@mail.ub.ac.id', 'PTI')->view('Notifications.NotifAnggota3.NotifAnggota3');
    }
}
