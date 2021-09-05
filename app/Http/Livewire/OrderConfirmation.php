<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gift;

class OrderConfirmation extends Component
{
    public $gift, $showNameOnWall, $note, $donorUpdatedName, $hostToCredit;
    public function mount($order_token)
    {
        $this->gift = Gift::where('order_token', '=', $order_token)->first();
        $this->showNameOnWall = 0;
        $this->donorUpdatedName = $this->gift->donor->full_name;
    }
    public function render()
    {
        return view('livewire.order-confirmation')->layout('layouts.guest');
    }
    
    public function showDonorName()
    {
        $this->showNameOnWall = !$this->showNameOnWall;
    }

    public function saveDonorNote()
    {
        Donor::where('gift_id', '=', $this->gift->id)
            ->update([
                'note' => $this->note,
            ]);
    }
}
