<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Demmande;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class refuseStagaire extends Mailable
{
    use Queueable, SerializesModels;
    public $Stagaire;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Demmande $employe)
    {
        $this->Stagaire = $employe;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
        return $this->subject('Demmande Refused');
                    
    }
  

    
    public function content()
{
    return (new Content())->view('email.Demmande')->with('Stagaire', $this->Stagaire);
}

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
