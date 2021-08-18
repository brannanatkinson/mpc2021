<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\Item;

class Catalog extends Component
{
    public function render()
    {
        return view('livewire.store.catalog')
            ->withItems(Item::all())
            ->layout('layouts.guest');;
    }
}
