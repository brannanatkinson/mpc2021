<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;

class Items extends Component
{
    public $items;
    public function mount()
    {
        $this->items = Item::all();
    }
    public function render()
    {
        return view('livewire.items')->layout('layouts.guest');;
    }
}
