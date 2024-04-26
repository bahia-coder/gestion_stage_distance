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

class MassageSent2 implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $massage;
    public $receiver;
    public $conversation;



    public function __construct(Employe $sender, Message $massage, Conversation $conversation, Stagaire $receiver)
    {
        $this->sender = $sender;
        $this->massage = $massage;
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
        return new PrivateChannel('chat2.'.$this->receiver->id);
    }
}