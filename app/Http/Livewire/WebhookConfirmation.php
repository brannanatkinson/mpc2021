<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class WebhookConfirmation extends Component
{    
    public $result;
    public function mount(Request $request)
    {
        $this->result = $request->all();
    }

    public function render()
    {
        return view('livewire.webhook-confirmation')->layout('layouts.guest');
    }
}
