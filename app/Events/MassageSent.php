<?php

namespace App\Events;

use App\Models\Conversation;
use App\Models\Employe;
use App\Models\Message;
use App\Models\Stagaire;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MassageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $massage;
    public $receiver;
    public $conversation;

    public function __construct(Stagaire $sender, Message $massage, Conversation $conversation, Employe $receiver)
    {

        $this->sender = $sender;
        //dd($this->conversation->id);
        $this->massage = $massage;
        //dd($this->sender->email);
        $this->conversation = $conversation;
        $this->receiver = $receiver;
       
    }

    public function broadcastWith()
    {
        
        return [
            'sender_email' => $this->sender->email,
            'message' => $this->massage->id,
            'conversation_id' => $this->conversation->id,
            'receivere_email' => $this->receiver->email,
        ];
    }

    public function broadcastOn()
    {
        //dd('hi');
        $chanel=new PrivateChannel('chat.'.$this->receiver->id);
        
        return $chanel;
    }
}