<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class WebhookConfirmation extends Component
{
    $publicRequest;
    public function mount(Request $request)
    {
        $this->publicRequest = $this->$request;
    }
    public function render(Request $request)
    {
        return view('livewire.webhook-confirmation');
    }
}
