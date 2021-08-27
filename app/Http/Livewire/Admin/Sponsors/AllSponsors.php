<?php

namespace App\Http\Livewire\Admin\Sponsors;

use Livewire\Component;
use App\Models\Sponsor;
use Livewire\WithFileUploads;


class AllSponsors extends Component
{
    use WithFileUploads;

    public $sponsors;
    public $name, $category, $match, $item, $image, $website;
    public $createMode = false;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required',
        'category' => 'required',
    ];

    public function mount()
    {
        $this->sponsors = Sponsor::orderBy('id')->get();
    }
    public function render()
    {
        return view('livewire.admin.sponsors.all-sponsors');
    }

    public function showNewItemForm()
    {
        $this->createMode = !$this->createMode;
        $this->updateMode = false;
    }

    private function resetInput()
    {
        $this->name = null;
        $this->catetory = null;
        $this->match = null;
        $this->item = null;
        $this->image = null;
        $this->website = null;
    }

    public function saveNewSponsor(){
        $this->validate();

        if ( $this->image ){
             $photoPath = $this->image->store('public/photos/gifts');
        } else {
            $photoPath = null;
        }
       
        Category::create([
            'name' => $this->name,
            'category' => $this->category,
            'match' => $this->match,
            'item_id' => $this->item,
            'img' => $photoPath,
            'website' => $this->website,
        ]);

        $this->resetInput();
        $this->createMode = false;

    }
}
