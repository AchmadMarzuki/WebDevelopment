<?php

namespace App\Notifications\NotifAnggota1;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifAnggota1 extends Mailable {
    use Queueable, SerializesModels;

    public $namaketua;
    public $namaAnggota;
    
    public function __construct($NamaKetuaTim, $namaAnggota1){
        $this->namaketua = $NamaKetuaTim;
        $this->namaAnggota = $namaAnggota1;
    }
 
    public function build()
    {
        return $this->subject('SIPPL')->from('sippl@mail.ub.ac.id', 'PTI')->view('Notifications.NotifAnggota1.NotifAnggota1');
    }
}
