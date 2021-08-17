<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
//use App\Models\Doner;
use App\Models\Gift;
use App\Models\Item;
use App\Models\Host;

class WebhookConfirmation extends Component
{    
    public $result;
    private Donor $donor;
    private Gift $gift;
    private Item $items;
    public function mount(Request $request)
    {
        $this->result = $request->all();

        $donor = Donor::firstOrCreate([
            'order_token' => $result['content']['token'],
            'full_name' => $result['content']['billingAddress']['fullName'],
            'email_address' => $result['content']['email']
        ]);

    }

    public function render()
    {
        return view('livewire.webhook-confirmation')->layout('layouts.guest');
    }
}
