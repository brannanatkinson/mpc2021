<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gift;

class OrderConfirmation extends Component
{
    public $gift;
    public function mount($order_token)
    {
        $this->gift = Gift::where('order_token', '=', $order_token);
    }
    public function render()
    {
        return view('livewire.order-confirmation')->layout('layouts.guest');
    }
}
