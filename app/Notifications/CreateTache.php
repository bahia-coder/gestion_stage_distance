<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateTache extends Notification
{
    use Queueable;
    private $tache_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tache_id)
    {
        $this->tache_id=$tache_id;
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
            'tache_id' =>  $this->tache_id,
        ];
    }
}
