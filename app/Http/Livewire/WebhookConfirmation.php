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
    public $gift;
    public $host;
    public function mount(Request $request)
    {
        $this->result = $request->all();

        $donor = Donor::create([
            'order_token' => $this->result['content']['token'],
            'full_name' => $this->result['content']['billingAddressName'],
            'email_address' => $this->result['content']['email'],
            'address' => $this->result['content']['billingAddressAddress1'],
            'address_2' => $this->result['content']['billingAddressAddress2'],
            'city' => $this->result['content']['billingAddressCity'],
            'state' => $this->result['content']['billingAddressProvince'],
            'postal_code' => $this->result['content']['billingAddressPostalCode'],
        ]);

        $host = Host::where('name', $this->result['content']['items'][0]['customFields'][0]['value']);

        $gift = Gift::create([
            'order_token' => $this->result['content']['token'],
            'donor_id' => $donor->id,
            'gift_total' => $this->result['content']['finalGrandTotal'],
            'host_id' => $host->id
        ]);

        $this->gift = $gift;

        foreach ( $this->result['content']['items'] as $newItem )
        {
            $itemToStore = Item::where('name', $newItem['name'])->first();
            $gift->items()->attach( [ 'item_id' => $itemToStore->id ], [ 'item_quantity' => $newItem['quantity'] ] );
        }

    }

    public function render()
    {
        return view('livewire.webhook-confirmation')->layout('layouts.guest');
    }
}
