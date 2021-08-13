<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WebhookConfirmation extends Component
{    
    public $result;
    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.webhook-confirmation')->layout('layouts.guest');
    }
}
