<?php

namespace App\Http\Livewire\Admin\Items;

use Livewire\Component;
use App\Models\Item;

class AllItems extends Component
{
    public $items;
    public $updateMode = false;
    public $message = null;

    public function mount(){
        $this->items = Item::orderBy('id')->get();
    }
    public function render()
    {
        return view('livewire.admin.items.all-items');
    }

    public function showNewItemForm()
    {
        $this->updateMode = !$this->updateMode;
    }

    public function parent()
    {
        $this->message = 'you clicked child';
    }
}
