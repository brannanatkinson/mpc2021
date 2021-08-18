<?php

namespace App\Http\Livewire\Catalog;

use Livewire\Component;
use App\Models\Item;

class Catalog extends Component
{
    public function render()
    {
        return view('livewire.catalog.catalog.catalog')
            ->withItems(Item::all())
            ->layout('layouts.guest');;
    }
}
