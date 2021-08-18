<?php

namespace App\Http\Livewire\Livewire;

use Livewire\Component;
use App\Models\Item;

class Catalog extends Component
{
    public function render()
    {
        return view('livewire.livewire.catalog')
            ->withItems(Item::all())
            ->layout('layouts.guest');;
    }
}
