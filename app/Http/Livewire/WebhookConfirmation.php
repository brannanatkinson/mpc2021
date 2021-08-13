<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class WebhookConfirmation extends Component
{    
    public Request $request;
    public function mount(Request $request)
    {
        $this->request = $request;
    }

    public function render()
    {
        return view('livewire.webhook-confirmation')->layout('layouts.guest');
    }
}
