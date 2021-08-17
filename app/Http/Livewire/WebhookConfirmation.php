<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Donor;
use App\Models\Gift;
use App\Models\Item;
use App\Models\Host;

class WebhookConfirmation extends Component
{    
    public $result;
    public function mount(Request $request)
    {
        $this->result = $request->all();

        $donor = Donor::create([
            'order_token' => $this->result['content']['token'],
            'full_name' => $this->result['content']['billingAddressName'],
        ]);

    }

    public function render()
    {
        return view('livewire.webhook-confirmation')->layout('layouts.guest');
    }
}
