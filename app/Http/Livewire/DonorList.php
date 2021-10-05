<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Donor;

class DonorList extends Component
{
    public $donors;
    public function mount()
    {
        $this->donors = Donor::all();
    }
    public function render()
    {
        return view('livewire.donor-list')->layout('layouts.guest');
    }
}
