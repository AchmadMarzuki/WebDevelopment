<?php

namespace App\Notifications\NotifIndividu;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifIndividu extends Mailable {
    use Queueable, SerializesModels;

    public $namaindividu;
 
    
    public function __construct($namaindividu){
        $this->namaindividu = $namaindividu;
     }
 
    public function build()
    {
        return $this->subject('SIPPL')->from('sippl@mail.ub.ac.id', 'PTI')->view('Notifications.NotifIndividu.NotifIndividu');
    }
}
