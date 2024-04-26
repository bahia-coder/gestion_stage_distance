<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Employe;

use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmployeeCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $employe;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employe $employe)
    {
        $this->employe = $employe;
    }

   
    public function build()
    {
        return $this->subject('Welcome to our company');
                    
    }
  

    
    public function content()
{
    return (new Content())->view('email.employe')->with('employe', $this->employe);
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
