<?php

namespace App\Http\Livewire\Admin\Items;

use Livewire\Component;
use App\Models\Item;

class AllItems extends Component
{
    use WithFileUploads;

    public $items;
    public $updateMode = false;
    public $message = null;
    public $newItemName, $newItemDescription, $newItemImage, $newItemCategory;

    protected $rules = [
        'newItemName' => 'required',
        'newItemDescription' => 'required',
    ];

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

    public function saveNewItem(){
        $this->validate();

        Item::create([
            'name' => $this->newItemName,
            'description' => $this->newItemDescription,
            'category_id' => 1
        ])
    }
}
