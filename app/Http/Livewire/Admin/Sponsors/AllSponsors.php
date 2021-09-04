<?php

namespace App\Http\Livewire\Admin\Sponsors;

use Livewire\Component;
use App\Models\Sponsor;
use App\Models\Item;
use Livewire\WithFileUploads;


class AllSponsors extends Component
{
    use WithFileUploads;

    public $sponsors;
    public $name, $category, $amount, $item, $image, $website;
    public $createMode = false;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required',
        'category' => 'required',
    ];

    public function mount()
    {
        $this->sponsors = Sponsor::orderBy('amount', 'desc')->get();
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
        $this->amount = null;
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

        if ( $this->category != 'matching'){
            $this->item = null;
        }
       
        $sponsor = Sponsor::create([
            'name' => $this->name,
            'category' => $this->category,
            'amount' => $this->amount,
            'item_id' => $this->item,
            'img' => $photoPath,
            'website' => $this->website,
        ]);

        if ( $this->category == 'matching'){
           Item::find( $this->item )->update([
              'sponsor_id' => $sponsor->id,
           ]);
        }

        $this->resetInput();
        $this->createMode = false;
        $this->mount();

    }
}
