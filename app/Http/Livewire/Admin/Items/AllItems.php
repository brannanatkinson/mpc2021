<?php

namespace App\Http\Livewire\Admin\Items;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithFileUploads;


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
        'newItemDescription' => 'image|required',
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

        $photoPath = $this->newItemImage->store('photos');

        Item::create([
            'name' => $this->newItemName,
            'description' => $this->newItemDescription,
            'img' => $photoPath;
            'category_id' => 1,
            'cost' => 25.00
        ]);
    }
}
