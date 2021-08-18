<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Item;

class CatalogItem extends Component
{
    public $CatalogItem;
    public function mount($id)
    {
        $this->CatalogItem = Item::find($id);
    }
    public function render()
    {
        return view('livewire.catalog-item')->layout('layouts.guest');
    }
}
