<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateAnnonce extends Notification
{
    use Queueable;
    private $annonce_id;
    private $annonce_title;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($annonce_id,$annonce_title)
    {
        $this->annonce_id=$annonce_id;
        $this->annonce_title=$annonce_title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    

   public function toArray($notifiable)
    {
        return [
            'annonce_id' =>  $this->annonce_id,
            'annonce_title' =>  $this->annonce_title,
            
        ];
    }
}
