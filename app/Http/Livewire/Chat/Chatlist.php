<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Employe;
use App\Models\Stagaire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chatlist extends Component
{

    public $conversations;
    public $auth_email;
    public $receviverUser;
    public $selected_conversation;
    protected $listeners = ['chatUserSelected', 'refresh' => '$refresh'];

    public function mount()
    {
        $this->auth_email = auth()->user()->email;
    }

    public function getUsers(Conversation $conversation, $request)
    {
        if (auth('stagaire')->check()) {
            if ($conversation->sender_email == $this->auth_email) {
                $this->receviverUser = Employe::firstwhere('email', $conversation->receiver_email);
               // dd($this->receviverUser);
            } else {
                $this->receviverUser = Employe::firstwhere('email', $conversation->sender_email);
                //dd($this->receviverUser);
            }
            if (isset($request)) {
                //dd($this->receviverUser);
                return $this->receviverUser->$request;
            }
        }else{
            if ($conversation->sender_email == $this->auth_email) {
                $this->receviverUser = Stagaire::firstwhere('email', $conversation->receiver_email);
               // dd($this->receviverUser);
            } else {
                   $this->receviverUser = Stagaire::firstwhere('email', $conversation->sender_email);
                  // dd($this->receviverUser); 
            }
            if (isset($request)) {
                //dd($this->receviverUser); 
                return $this->receviverUser->$request;
            }
        }

       
    }


    public function chatUserSelected(Conversation $conversation, $receiver_id)
    {

        $this->selected_conversation = $conversation;
        
        if (Auth::guard('stagaire')->check()) {
            $this->receviverUser = Employe::find($receiver_id);
            $this->emitTo('chat.chatbox', 'load_conversationEmploye', $this->selected_conversation, $this->receviverUser);
            $this->emitTo('chat.send-message', 'updateMessage', $this->selected_conversation, $this->receviverUser);
        } else {
            $this->receviverUser = Stagaire::find($receiver_id);
            $this->emitTo('chat.chatbox', 'load_conversationStagaire', $this->selected_conversation, $this->receviverUser);
            $this->emitTo('chat.send-message', 'updateMessage2', $this->selected_conversation, $this->receviverUser);
        }

    }


    public function render()
    {
        $this->conversations = Conversation::where('sender_email', $this->auth_email)->orwhere('receiver_email', $this->auth_email)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('livewire.chat.chatlist');
    }
}