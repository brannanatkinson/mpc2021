<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class WebhookConfirmation extends Component
{
    $publicRequest;
    
    public function render(Request $request)
    {
        return view('livewire.webhook-confirmation');
    }
}
