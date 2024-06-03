<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Employe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Stagaire;
use App\Models\Message;
use App\Models\Conversation;
class Createchat extends Component
{
    public $users;
    public $auth_email;
    public function mount()
    {
        $this->auth_email = auth()->user()->email;
    }
   
    public function createConversation($receiver_email)
    {

        $chek_Conversation = Conversation::chekConversation($this->auth_email, $receiver_email)->get();
        if ($chek_Conversation->isEmpty()) {
            DB::beginTransaction();
            
                // $createConversation
                $createConversation = Conversation::create([
                    'sender_email' => $this->auth_email,
                    'receiver_email' => $receiver_email,
                    'last_time_message' => null,
                ]);
                Message::create([
                    'conversation_id' => $createConversation->id,
                    'sender_email' => $this->auth_email,
                    'receiver_email' => $receiver_email,
                    'body' => 'السلام عليكم',
                ]);
                DB::commit();
                $this->emitSelf('render');
            
        } else {

            dd('Conversation yes');
        }
    }


    public function render()
    {
        if(Auth::guard('stagaire')->check()){
                $this->users=Employe::all();
        }
        else{
            $this->users=Stagaire::all();
        }
        //dd($this->users);
        if(auth('stagaire')->check()){

            return view('livewire.chat.createchat')->extends('layouts.master_stagaire');
        }
        return view('livewire.chat.createchat')->extends('layouts.master_employe');
    }
}
