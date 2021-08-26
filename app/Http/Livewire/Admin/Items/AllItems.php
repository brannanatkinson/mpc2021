<?php

namespace App\Http\Livewire\Admin\Items;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithFileUploads;


class AllItems extends Component
{
    use WithFileUploads;

    public $items;
    public $createMode = false;
    public $updateMode = false;
    public $message = null;
    public $name, $description, $image, $category, $excerpt;
    public $selected_id;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'excerpt' => 'required',
        'image' => 'image|required',
    ];

    public function mount(){
        $this->items = Item::orderBy('id')->get();
    }
    public function render()
    {
        return view('livewire.admin.items.all-items');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->description = null;
        $this->image = null;
        $this->category = null;
    }

    public function showNewItemForm()
    {
        $this->createMode = !$this->createMode;
        $this->updateMode = false;
    }

    public function saveNewItem(){
        $this->validate();

        $photoPath = $this->image->store('public/photos/gifts');

        Item::create([
            'name' => $this->name,
            'description' => $this->description,
            'img' => $photoPath,
            'excerpt' = $this->excerpt,
            'category_id' => 1,
            'cost' => 25.00
        ]);

        $this->resetInput();

    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $this->selected_id = $item->id;
        $this->name = $item->name;
        $this->description = $item->description;
        $this->updateMode = true;
        $this->createeMode = false;
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = Item::find($this->selected_id);
            if ( $this->image ){
                $photoPath = $this->image->store('public/photos/gifts');
                $record->update([
                    'img' => $photoPath,
                ]);
            } 
            $record->update([
                'name' => $this->name,
                'description' => $this->description,
                'excerpt' => $this->excerpt
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }
}
