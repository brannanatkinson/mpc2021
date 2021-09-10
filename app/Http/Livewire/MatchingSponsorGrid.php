<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sponsor;

class MatchingSponsorGrid extends Component
{
    public $MatchingSponsors;
    public function mount()
    {
        $this->MatchingSponsors = Sponsor::where('category', '=', 'matching')->orderBy('name')->get();
    }
    public function render()
    {
        return view('livewire.matching-sponsor-grid');
    }
}
