<?php

namespace App\Notifications\NotifKetuaTim;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifKetuaTim extends Mailable {
    use Queueable, SerializesModels;

    public $namaketua;
 
    
    public function __construct($NamaKetuaTim){
        $this->namaketua = $NamaKetuaTim;
     }
 
    public function build()
    {
        return $this->subject('SIPPL')->from('sippl@mail.ub.ac.id', 'PTI')->view('Notifications.NotifKetuaTim.NotifKetuaTim');
    }
}
