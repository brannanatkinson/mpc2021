<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sponsor;

class SponsorGrid extends Component
{
    public $sponsors;

    public function mount()
    {
        $this->sponsors = Sponsor::
            orderBy('category', 'desc')
            ->orderBy('name', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.sponsor-grid');
    }
}
