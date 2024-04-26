<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        if (auth('stagaire')->check()) {
            return view('livewire.chat.main')->extends('layouts.master_stagaire');
        }else{
            return view('livewire.chat.main')->extends('layouts.master_employe');
        }
       
    }
}
