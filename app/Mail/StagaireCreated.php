<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Stagaire;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StagaireCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    use Queueable, SerializesModels;
    public $Stagaire;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Stagaire $employe)
    {
        $this->Stagaire = $employe;
    }

   
    public function build()
    {
        return $this->subject('Welcome to our company');
                    
    }
  

    
    public function content()
{
    return (new Content())->view('email.Stagaire')->with('Stagaire', $this->Stagaire);
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
