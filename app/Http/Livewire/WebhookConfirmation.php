<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Donor;
use App\Models\Gift;
use App\Models\Item;
use App\Models\Host;
use App\Models\User;

class WebhookConfirmation extends Component
{    
    public $result;

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

        $user = User::where('name', $this->result['content']['items'][0]['customFields'][0]['value'])->first();

        $gift = Gift::create([
            'order_token' => $this->result['content']['token'],
            'donor_id' => $donor->id,
            'gift_total' => $this->result['content']['finalGrandTotal'],
            'user_id' => $user->id
        ]);

        $donor->gift_id = $gift->id;
        $donor->save();

        // send Donor thank you email

        foreach ( $this->result['content']['items'] as $newItem )
        {
            $itemToStore = Item::where('name', $newItem['name'])->first();
            $gift->items()->attach( [ 'item_id' => $itemToStore->id ], [ 'item_quantity' => $newItem['quantity'] ] );
            if ( $user->name != '--' )
            {
                $user->items()->attach( [ 'item_id' => $itemToStore->id ], [ 'item_quantity' => $newItem['quantity'] ] );
                // send Host email about donor gift
            }    
        }

    }

    public function render()
    {
        return view('livewire.webhook-confirmation')->layout('layouts.guest');
    }
}
