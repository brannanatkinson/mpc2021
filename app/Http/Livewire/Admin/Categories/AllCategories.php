<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;

class AllCategories extends Component
{
     protected $rules = [
        'name' => 'required',
        'description' => 'required',
    ];

    public $categories; 
    public $createMode = false;
    public $updateMode = false;
    public $message = null;
    public $name, $description;
    public $selected_id;

    public function mount()
    {
        $this->categories = Category::orderBy('id')->get();
    }

    public function render()
    {
        return view('livewire.admin.categories.all-categories');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->description = null;
    }

    public function showNewItemForm()
    {
        $this->createMode = !$this->createMode;
        $this->updateMode = false;
    }

    public function saveNewCategory(){
        $this->validate();

        Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->resetInput();
        $this->createMode = false;

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->selected_id = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->updateMode = true;
        $this->createeMode = false;
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = Category::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'description' => $this->description,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }
}
