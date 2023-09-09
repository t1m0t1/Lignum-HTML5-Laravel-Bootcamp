<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Message extends Component
{
    public $message;
    
    public function render()
    {
        return view('livewire.message');
    }
}
