<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Employe;
use App\Models\Message;
use App\Models\Stagaire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chatbox extends Component
{

    public $receiver;
    public $selected_conversation;
    public $receviverUser;
    public $messages;
    public $auth_email;
    public $auth_id;
    public $event_name;
    public $chat_page;

    //protected $listeners = ['load_conversationEmploye',  Stagaire 'load_conversationStagaire', 'pushMessage'];

    public function mount()
    {
        if (Auth::guard('stagaire')->check()) {
            $this->auth_email = Auth::guard('stagaire')->user()->email;
            $this->auth_id = Auth::guard('stagaire')->user()->id;
        } else {
            $this->auth_email = Auth::guard('employe')->user()->email;
            $this->auth_id = Auth::guard('employe')->user()->id;
        }

    }

    public function getListeners()
    {
        if (Auth::guard('stagaire')->check()) {
            $auth_id = Auth::guard('stagaire')->user()->id;
            $this->event_name = "MassageSent2";
            $this->chat_page = "chat2";

        } else {
            $auth_id = Auth::guard('employe')->user()->id;
            $this->event_name = "MassageSent";
            $this->chat_page = "chat";
            //dd($auth_id);
        }

        return [
            "echo-private:$this->chat_page.{$auth_id},$this->event_name" => 'broadcastMassage', 'load_conversationStagaire', 'load_conversationEmploye', 'pushMessage'
        ];
    }
    

    public function broadcastMassage($event)
    {
        $broadcastMessage = Message::find($event['message']);
        $broadcastMessage->read = 1;
        $this->pushMessage($broadcastMessage->id);
    }

    public function pushMessage($messageId)
    {
        $newMessage = Message::find($messageId);
        $this->messages->push($newMessage);
    }


    public function load_conversationEmploye(Conversation $conversation, Employe $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receviverUser = $receiver;
        $this->messages = Message::where('conversation_id', $this->selected_conversation->id)->get();
    }

    public function load_conversationStagaire(Conversation $conversation, Stagaire $receiver)
    {

        $this->selected_conversation = $conversation;
        $this->receviverUser = $receiver;
        $this->messages = Message::where('conversation_id', $this->selected_conversation->id)->get();
    }


    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}